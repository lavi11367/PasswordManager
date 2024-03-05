<?php
 session_start();
include('include/config.php');

 ?>
<!doctype html>
<html lang="en" class="no-js">
<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <?php include('include/link_css.php'); ?>   
    <link rel="stylesheet" href="assets/css/Geneator.css">
    <?php include('include/header.php'); ?>
    <style>

        ::-webkit-scrollbar {
            display: none;
        }
        .container1 {
            margin-top: -25px;
            position:relative;
        }
        #con{
            position: relative;
            left:34%;
            margin-top:3%;
        }
        *{
            -webkit-user-select: none; /* Safari */
            -moz-user-select: none; /* Firefox */
            -ms-user-select: none; /* IE10+/Edge */
            user-select: none; /* Standard syntax */

        }

        .input-box{
            user-select:none;
        }
    </style>
</head>
<header></header>
<body>
<script>document.querySelectorAll('input').forEach(input => {
        input.addEventListener('mousedown', function(event) {
            event.preventDefault();
        });
    });
</script>
<div class="container1" id="con">
      <h2>Password Generator</h2>
      <div class="wrapper">
        <div class="input-box">
          <input type="text" disabled >
          <span class="material-symbols-rounded">copy_all</span>
        </div>
        <div class="pass-indicator"></div>
        <div class="pass-length">
          <div class="details">
            <label class="title">Password Length</label>
            <span></span>
          </div>
          <input type="range" min="1" max="30" value="15" step="1">
        </div>
        <div class="pass-settings">
          <label class="title">Password Settings</label>
          <ul class="options">
            <li class="option">
              <input type="checkbox" id="lowercase" checked>
              <label for="lowercase">Lowercase (a-z)</label>
            </li>
            <li class="option">
              <input type="checkbox" id="uppercase">
              <label for="uppercase">Uppercase (A-Z)</label>
            </li>
            <li class="option">
              <input type="checkbox" id="numbers">
              <label for="numbers">Numbers (0-9)</label>
            </li>
            <li class="option">
              <input type="checkbox" id="symbols">
              <label for="symbols">Symbols (!-$^+)</label>
            </li>
            <li class="option">
              <input type="checkbox" id="exc-duplicate">
              <label for="exc-duplicate">Exclude Duplicate</label>
            </li>
            <li class="option">
              <input type="checkbox" id="spaces">
              <label for="spaces">Include Spaces</label>
            </li>
          </ul>
        </div>
        <button class="generate-btn">Generate Password</button>
      </div>
    </div>
    
    <?php include('include/jslink.php');   ?> 


</body>
</html>

