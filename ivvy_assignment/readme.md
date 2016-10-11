## Summary

This is simple crud ( create, read, update, delete) application for managing a list of people (add, list, delete) built using 
Laravel Version '5.1.26 (LTS)' 

Currently the application saves the peoples data (first name, last name, date of birth, gender & files)
Each user can upload a single zip file, which could have N files with in it
Once the users details are added the system uploads the zip file to the `public/uploads` directory and then extract the
zip file to `public/uploads/:user_id` and saves the file name for all the files in that zip against the user_id
You can even edit users data (without zipfile) and can delete a user

## Laravel Installation

System Requirements

- PHP >= 5.6.4
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

## Project Installation

- Extract the project folder in your web server's root directory
- Install Composer if not already installed (https://getcomposer.org/doc/00-intro.md)
- From the project document root run `composer install`
- Run `php artisan generate:key` to generate a new key for the local setup
- Run `php artisan cache:clear` to clear the cache
- Create a blank database named `ivvy_assignment` (To use any other database name you will need to update .env file 
and add the correct db settings)
- Now run `php artisan migrate` this will create necessary tables required for the project to run in the above database
- To import seed data run `php artisan db:seed --class=UsersTableSeeder` this will import dummy people records in database
- Run `php artisan serve` this will start the project

## Open Source Libraries / Frameworks Used

- Laravel for PHP Framework
- Bootstrap for Styling & Validations
- jQuery & jQuery UI for datepicker
- Toastr for showing toast messages

## Author

Pratik Shah 
Sr. Software Engineer - PHP
Cygnet Infotech Pvt Ltd
(e) pjshah@cygnet-infotech.com