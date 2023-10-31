# Xjudge

## Instructions for running locally

To run a development server,

1. Install Node.js and run
```bash
npm install
```
to install Node.js dependencies.

2. Install [https://getcomposer.org/](Composer), the PHP package manager, and run
```bash
composer install
```
to install the necessary PHP packages.

3. To start a PHP server, assuming PHP is in path, run the following from the project root:
```bash
php -S localhost:8888 -t public
```
