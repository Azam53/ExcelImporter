# README #

This README would normally document whatever steps are necessary to get your application up and running.

### What is this repository for? ###

* It is a Excel File Importer
* Version 1.0

### How do I get set up? ###

* Clone from github in web root.

* Run below command:
      composer update

* Edit .env file with your database credential i.e. username and password.

* Generate key by the below command
      php artisan key:generate

* run migration via below command
      php artisan migrate

* run seeder if any check in commit
      php artisan db:seed      

* hit the below url in browser
      http://localhost:8000/login

### Contribution guidelines ###

* Writing tests
* Code review
* Other guidelines

### Who do I talk to? ###

* Repo owner or admin
* Other community or team contact