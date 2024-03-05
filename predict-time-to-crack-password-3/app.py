import math
import joblib
import pandas as pd
from flask import Flask, request, jsonify, render_template
from flask_cors import CORS

app = Flask(__name__)
CORS(app)  # تفعيل CORS

path = '.'
s_model = joblib.load(f'{path}/models/strength_model.pkl')
e_model = joblib.load(f'{path}/models/exponent_model.pkl')
t_model = joblib.load(f'{path}/models/time_model.pkl')


@app.route('/')
def home():
    return render_template('index.html')


def get_passwords(input_passwords):
    pswd = [input_passwords]
    df3 = pd.DataFrame(pswd, columns=['password'])
    return df3


def calculate_entropy(password):
    lw, up, dg, sp = 0, 0, 0, 0
    for char in password:
        if char.islower():
            lw += 1
        elif char.isupper():
            up += 1
        elif char.isdigit():
            dg += 1
        else:
            sp += 1
    csz = 0
    if lw > 0:
        csz += 26
    elif up > 0:
        csz += 26
    elif dg > 0:
        csz += 10
    elif sp > 0:
        csz += 32

    character_set_size = csz
    password_length = len(password)
    entropy = math.log2(character_set_size ** password_length)
    return entropy


def predict_time(dftmp, strength_model, exp_model, time_model):
    entropy_list, length_list = [], []
    for password in dftmp['password'].values:
        length_list.append(len(password))
        entropy = calculate_entropy(password)
        entropy_list.append(entropy)
    dftmp['length'] = length_list
    dftmp['entropy'] = entropy_list

    strength = strength_model.predict(dftmp.drop(columns=['password']))
    dftmp['strength'] = strength

    exponent = exp_model.predict(dftmp.drop(columns=['password']))
    dftmp['exponent'] = exponent

    time_val = time_model.predict(dftmp.drop(columns=['password']))
    dftmp['time'] = time_val

    time_sec = []
    for i in dftmp.index:
        ex = dftmp.loc[i, 'exponent']
        ti = dftmp.loc[i, 'time']
        time_sec.append(ti * 10**ex)

    dftmp['time_sec'] = time_sec
    return dftmp


def convert_seconds_to_time(seconds):
    minutes, seconds = divmod(seconds, 60)
    hours, minutes = divmod(minutes, 60)
    days, hours = divmod(hours, 24)
    months, days = divmod(days, 30)
    years, months = divmod(months, 12)
    centuries, years = divmod(years, 100)
    return int(centuries), int(years), int(months), int(days), int(hours), int(minutes), seconds


def result_of_time_processing(seconds):
    label = {
        0: {  # 'century'
            'singl': 'Century',
            'plural': 'Centuries'
        },
        1: {  # 'year'
            'singl': 'Year',
            'plural': 'Years'
        },
        2: {  # 'month'
            'singl': 'Month',
            'plural': 'Months'
        },
        3: {  # 'day'
            'singl': 'Day',
            'plural': 'Days'
        },
        4: {  # 'hour'
            'singl': 'Hour',
            'plural': 'Hours'
        },
        5: {  # 'minut'
            'singl': 'Minut',
            'plural': 'Minuts'
        },
        6: {  # 'second'
            'singl': 'Second',
            'plural': 'Seconds'
        }
    }

    res = list(convert_seconds_to_time(seconds))
    txt = []
    for i in range(len(res)):
        val = res[i]
        if val > 0:
            if val > 1:
                t = f"'{val}' {label[i]['plural']}"
            else:
                t = f"'{val}' {label[i]['singl']}"
            txt.append(t)
    if len(txt) > 1:
        result = ", ".join(txt[:-1])
        result += f", And {txt[-1]}"
    else:
        result = ", ".join(txt)
    return result


def mainFunction(values):
    df3 = get_passwords(values)
    # Predicting:
    df3 = predict_time(df3, s_model, e_model, t_model)
    if 'time_sec' in df3.columns:
        df3.loc[0, 'result'] = result_of_time_processing(df3.loc[0, 'time_sec'])
        final_result = f"Time needed to crack [{df3.loc[0, 'password']}] is: {df3.loc[0, 'result']}"
    else:
        final_result = "Error in prediction"
    return final_result


@app.route('/predict', methods=['POST'])
def predict():
    '''
    For rendering results on HTML GUI
    '''
    try:
        int_features = [x for x in request.form.values()]
        output = mainFunction(int_features)
        return render_template('index.html', prediction_text=output)
    except Exception as e:
        return render_template('index.html', prediction_text=f"Error: {e}")


def API_Function(values):
    df3 = get_passwords(values)
    df3 = predict_time(df3, s_model, e_model, t_model)
    final_result = df3['time_sec'].values[0]
    return str(final_result)


@app.route('/api/predict', methods=['POST'])
def api_predict():
    '''
    Endpoint for API predictions
    '''
    try:
        data = request.get_json(force=True)
        password = data['password']
        result = API_Function(password)
        return jsonify({'time_sec': str(result)})
    except Exception as e:
        return jsonify({'error': f"Error: {e}"})


if __name__ == "__main__":
    app.run(debug=True)
