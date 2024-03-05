# Project Database Setup Instructions
**Make a Database And replace "SecureKeyGuard" with your own database name or make a databse with the name SecureKeyGuard

To ensure the SQL functionalities of this project work correctly on your local machine, you need to set up the necessary tables in your database. Below are the SQL commands to create the required tables. These commands check if a table already exists before attempting to create it, preventing any accidental overwrites.


Instructions
Log into your local SQL server.
Select the database you intend to use for this project.
Execute the provided SQL commands to create the User, Passwords, Massage_table, and Notifications tables.
Ensure that the tables are created successfully and contain the appropriate columns as outlined above.
By following these instructions, your database will be set up with the necessary tables and ready to support the project's SQL functionalities. If you encounter any issues with the table creation, ensure your SQL server is up to date and that you have the necessary permissions to create tables.

*User Table*

This table stores user information.

```sql
CREATE TABLE if NOT EXISTS User (
  ID int(11) NOT NULL AUTO_INCREMENT,
  UserName varchar(100) NOT NULL,
  Passwords varchar(100) NOT NULL,
  Email varchar(150) NOT NULL,
  States int(2) NOT NULL,
  verification_code varchar(50) DEFAULT NULL,
  CreationDate timestamp NULL DEFAULT current_timestamp(),
  UpdationDate timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (ID)
);

*Passwords Table*
This table stores passwords related to each user.

sql
Copy code
CREATE TABLE if NOT EXISTS Passwords (
  ID int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Name varchar(120) NOT NULL,
  Password varchar(200) NOT NULL,
  ID_User int(11) NOT NULL,
  CreationDate timestamp NULL DEFAULT current_timestamp(),
  UpdationDate timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  RememberDate timestamp NULL DEFAULT NULL,
  FOREIGN KEY (ID_User) REFERENCES User(ID)
);
*Message Table*
This table stores messages from users.

sql
Copy code
CREATE TABLE if NOT EXISTS Massage_table (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  ID_User int(11) NOT NULL,
  Name varchar(120) NOT NULL,
  phone varchar(20) NOT NULL,
  Textmassage varchar(500) NOT NULL,
  Email varchar(100) NOT NULL,
  RegDate timestamp NOT NULL DEFAULT current_timestamp(),
  FOREIGN KEY (ID_User) REFERENCES User(ID)
);
*Notifications Table*
This table stores notifications for users.

sql
Copy code
CREATE TABLE if NOT EXISTS Notifications (
  ID int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Name varchar(50) NOT NULL,
  ID_User int(11) NOT NULL,
  CreationDate timestamp NULL DEFAULT current_timestamp(),
  Notification_Date timestamp NULL DEFAULT NULL,
  FOREIGN KEY (ID_User) REFERENCES User(ID)
);

