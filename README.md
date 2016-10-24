# symfony-forms

# Installation

composer create-project symfony/framework-standard-edition "G:\Vagrant\Forms.Symfony"
DB_NAME: symfony_forms
TABLE_NAME: 
queue, 
service

# DB Initialisation

php app/console doctrine:schema:update --force



# Tasks undertaken during development

CREATE DATABASE symfony_forms;
USE DATABASE symfony_forms;

# Bundle Initialisation

php app/console doctrine:generate:entity --entity:"AppBundle\Queue"

# Navigate to the URL mentioned in this box

The project is setup at localhost:9999 in a php localhost environment

Navigate to http://localhost:9999/queue

