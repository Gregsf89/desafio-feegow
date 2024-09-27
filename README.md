# Feegow Challenge - Backend

> This application was developed for Feegow's technical challenge. The objective is to create a RESTful API that manages Funcionarios and their COVID Vaccination data.

## Index

- [About](#about)
- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)

## About

This application aims to meet the need to manage Funcionarios and their COVID Vaccination data. It allows creating and editing Funcionarios, Vacina Batches, and Vacina Dose data for Funcionarios.

## Requirements

- To interact with the application, you will need an HTTP client such as [Postman](https://www.postman.com/) or [Insomnia](https://insomnia.rest/).
- You will also need to copy this repository to your computer, so you must have [Git](https://git-scm.com/downloads) installed on your machine.
- In your terminal, navigate to the directory where you want to clone this repository.
- With Git installed, you can clone the repository using the command `git clone https://github.com/feegow/feegow-challenge-covid.git`.
- Once this is done, there are now two ways to [run the application](#installation):

## Installation

### 1. Using [Docker](https://docs.docker.com/get-started/) to run the application.
- To do this, install [Docker](https://docs.docker.com/desktop/) on your computer.
- In your terminal, navigate to the project root directory.
- Use the command `docker build -t desafio-feegow .` in your terminal of choice.
- Then use the command `docker run -p 8000:8000 desafio-feegow desafio-feegow` to run the application.

### 2. Using [PHP](https://www.php.net/docs.php) to run the application.
- To do this, install [PHP](https://www.php.net/downloads) on your computer.
- Also install [Composer](https://getcomposer.org/download/) on your machine.
- Use the command `composer install` in your terminal from the project root directory.
- copy the `.env.example` file to a new file called `.env` using the command `cp .env.example .env` in your terminal.
- Then use the command `php artisan migrate:fresh --seed` to populate the database with the necessary information.
- Finally, use the command `php artisan serve` to run the application.

### 3. You can change the database configuration in the `.env` file to use a different database.
- The default configuration is to use a SQLite database, which is already configured in the `.env` file and in the `Dockerfile`.
- To change the database configuration to MYSQL, you just need to change the `DB_CONNECTION` to `mysql` and fill in the other fields with the necessary information.
- To the Docker enviroment, you'll need to update the `Dockerfile` at line 35 from `ENV DB_CONNECTION=sqlite` to `ENV DB_CONNECTION=mysql`.
- To the PHP/Composer enviroment, you'll need to update the `.env` file at line 22 from `DB_CONNECTION=sqlite` to `DB_CONNECTION=mysql`.

## Usage

- In both cases, the application will be available at `http://localhost:8000/` to interact with the API through an HTTP client.
- At the endpoint `http://localhost:8000/api/v1/documentation`, you will find the API documentation.
