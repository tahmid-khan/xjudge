# [Xjudge](https://github.com/tahmid-khan/xjudge)

## Instructions for running locally

To run a development server,

1. Install Node.js and run
```bash
npm install
```
to install Node.js dependencies.

2. Install [Composer](https://getcomposer.org/), the PHP package manager, and run
```bash
composer install
```
to install the necessary PHP packages.

3. Update your local MySQL/MariaDB server's credentials in `config.php` and run `schema.sql` in your local MySQL/MariaDB server to create the database schema and integrate the database with the application.

4. To start a PHP server, assuming PHP is in `PATH`, run the following from the project root:
```bash
php -S localhost:8888 -t public
```

If the port 8888 is in use, replace it with another port number.
