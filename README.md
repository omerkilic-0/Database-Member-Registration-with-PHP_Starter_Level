# Database-Member-Registration-with-PHP_Starter_Level
It is a simple SQL account creation and login application with PHP.

# User Registration and Login System
This repository contains PHP scripts that implement a simple user registration and login system using MySQL as the database. Users can register with a username, email, and password, and registered users can log in using their credentials.

# Features
* User registration with username, email, and password
* Password hashing and verification using password_hash() and password_verify()
* User login authentication
* Session management for logged-in users
* Simple Bootstrap-based UI for registration and login forms

# File Structure
```
Database Member Registration with PHP
├── connect.php
├── exit.php
├── index.php
├── login.php
└── profile.php
```
 
# Files and Structure
connect.php: Establishes a connection to the MySQL database and sets character encoding.
index.php: Contains the registration form and processing logic. Validates user inputs and inserts new users into the database.
login.php: Provides the login form and authentication logic. Validates user inputs, checks the database for matching records, and creates a session for logged-in users.
profile.php: Displays user information if logged in. Redirects to login page if not authenticated.
exit.php: Logs the user out by destroying the session and redirecting to the login page.

# Getting Started
1. Make sure you have a local web server (e.g., Apache) installed and running.
2. Set up a MySQL database named membership with a table named users. The users table should have columns: id (auto-increment), user_name, email, and password.
3. Modify the connect.php script to provide your MySQL database credentials.
4. Upload the scripts to your web server's directory.
5. Access index.php to register as a new user. After registration, you'll be able to log in using the provided credentials.

# Usage
##   1. Registration:
  * Access index.php.
  * Fill in the registration form with a valid username, email, password, and password confirmation.
  * Upon successful registration, you'll receive a success message.
##   2. Login:
  * Access login.php.
  * Enter your registered username and password.
  * Upon successful login, you'll be redirected to profile.php where your username and email will be displayed.
##   3. Profile:
  * If logged in, access profile.php to view your username and email.
  * Click the "Exit" link to log out and destroy the session.

# Application Information
I developed this application during my internship at Train Payment Inc. (PAYGURU) from August 1st, 2023, to August 28th, 2023.

# License
This project is licensed under the MIT License. See the LICENSE.md file for details.

# Images
![Ekran görüntüsü 2023-08-29 180913](https://github.com/omerkilic-0/Database-Member-Registration-with-PHP_Starter_Level/assets/123635257/c7b802df-6f7a-4e29-bd63-26dbe5831e46)
![Ekran görüntüsü 2023-08-29 180830](https://github.com/omerkilic-0/Database-Member-Registration-with-PHP_Starter_Level/assets/123635257/56d16697-2053-4a38-ba8b-b3c7a435de35)
![Ekran görüntüsü 2023-08-29 180854](https://github.com/omerkilic-0/Database-Member-Registration-with-PHP_Starter_Level/assets/123635257/158bd47b-dde5-4b41-9d1f-5794a761d6e3)
