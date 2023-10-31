# Xjudge

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

3. Update your local MySQL/MariaDB server's credentials in `config.php`, and run `schema.sql` in MySQL/MariaDB to create the database.

4. To start a PHP server, assuming PHP is in `PATH`, run the following from the project root:
```bash
php -S localhost:8888 -t public
```

If the port 8888 is in use, replace it with another port number.
