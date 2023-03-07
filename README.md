# Laravel Chatbot
A basic chatbot made with the Laravel framework in one of my classes.

![lara_chat](https://user-images.githubusercontent.com/123499791/223319426-458eab87-58b1-44cf-b4e1-04ddb5829c03.png)

## How does it work
- The chatbot returns a response based on the first matching keyword that is found in the message
- Each conversation is bound to the user that created it
- An account section makes it possible to modify the current user

## What does it use
- PHP 7.4.25
- Laravel Framework 8.83.27
- Laravel Breeze v1.9.2

## How to use
Clone the project or download the files
```bash
git clone https://github.com/oli-moreau/laravel-chatbot.git
```
Install the dependencies
```bash
composer install && npm install && npm run dev
```
Copy the '.env.example' file
```bash
cp .env.example .env
```
Create a database, edit the '.env' file with the required information & migrate:
```bash
php artisan migrate
```
Generate the project key
```bash
php artisan key:generate
```
Run the project
```bash
php artisan serve
```
