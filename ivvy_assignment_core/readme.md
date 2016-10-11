## Summary

This is simple crud ( create, read, update, delete) application for managing a list of people (add, list, delete) built using 
OOPS concepts' 

Currently the application saves the peoples data (first name, last name, date of birth, gender & files)
Each user can upload a single zip file, which could have N files with in it
Once the users details are added the system uploads the zip file to the `uploads` directory and then extract the
zip file to `uploads/:user_id` and saves the file name for all the files in that zip against the user_id
You can even edit users data (without zipfile) and can delete a user

## Installation

System Requirements

- PHP >= 5.6.4
- MySQL

## Project Installation

- Extract the project folder in your web server's root directory
- Execute the database script `ivvy_core.sql` this will create a new database and will insert seed data for users
- Db Connection config file is at `config/database.php`
- Set the `base_url` in `config/core.php`

## Open Source Libraries / Frameworks Used

- Bootstrap for Styling & Validations
- jQuery & jQuery UI for datepicker
- Bootbox for showing bootstrap dialog boxes

## Author

Pratik Shah 
Sr. Software Engineer - PHP
Cygnet Infotech Pvt Ltd
(e) pjshah@cygnet-infotech.com