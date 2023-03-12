# TodoList
Openclassrooms project 08

## Context
As a dev, I have been hired to work on the repo of a company. My missions are:
- Audit the project as is (find anomalies, test performance, annalyse code)
- Create documentation on what needs to be fixed and how
- Fix bugs
- Refacto code
- Add new features and security
- Add testing and get > 70% of coverage

## Original Version

PHP : 
Symfony :

## Current Version

PHP : 7.4.26
Symfony : 4.4

## Installation

You can clone or download the github project

```bash
git clone https://github.com/CHBHR/TodoList.git
```
Don't forget to change local variables in the .env file

Instal dependencies with composer

```bash
composer install
```
Create database

```bash
php bin/console doctrine:database:create
```

Update and add the tables

```bash
php bin/console doctrine:migrations:migrate
```
You can add fixtures to the normal database to check functionnalities

```bash
php bin/console doctrine:fixtures:load
```

## Issues

Migrating the project to Symfony 4.4 created a lot of issues (not including deprecations) such as:
- A duplication of config files (config.yml and config.yaml)
- The change of project init and of the Bootstrap.php and Kernel.php files was very hard to manage and control
- A lot on hidden executions causing unwanted slowness during tech audit
All of those issues are documented and can be found in the documentation here: (TOBEFILLED)

Those issues made for a codebase that became very hard to manage, fix or maintain.
Therefore, I chose to transfer the functionnalities to a new and updated web app project : https://github.com/CHBHR/TodoList_Remastered

The new repository allowed me to implement all the testing without any issues, have a stable code that is up to date with current PHP / Symfony versions, security
and documentation for ease of implemantation in the future.

## Current state

The project can still be initialized and visited, but no functional testing has been yet implemented.

