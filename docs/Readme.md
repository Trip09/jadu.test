# Approach && recommendations

For this delivery I choice to go with Symfony Version 3.4 (Long term support) + Sonata Admin. This help me build a friendly interface without the need to re-invent the wheel.
There wasn't to much planning since the exercise was quit easy so nothing special in this topic. The app code is inside src/AppBundle folder and the docs on docs (time.md, installation.md, readme.md).
On the deploy I always adopt the green-blue approach so each deploy must be a new build. The app version should be Backwards Compatible and for that the database it's normally the more sensible point-of-failure.
For insuring the maximum Backwards Compatibility, the database fields should never be deleted, if a field is not used anymore the field should allow null values and not be used. There is already a bundle in the app for migrations and this should be used to handle the migrations change data if required. The migration should be executed by the release manager on the deploy process.
For building the image and automatize the deploy process we can use ansible and with that we can unsure that nothing is forgoten on deploy. If possible we can use Terraform to have our infrastructure-as-code.

# Installation

## Minimum Requirements
### nginx (or apache || httpd)
### PHP 7.1
### mysql 5.6
### composer
### make

## Test Environment
Currently the test run on dev database a process for indepentent test database should be placed.

## Production Environment
- Application Entrypoint
project/web/app.php

Run `composer install` on project folder

Parameters on
- 'project/app/config/parameters/parameters_base.yml'
- 'project/app/config/parameters/parameters_prod.yml'

Delete file:
- app_dev.php

Change Robots.txt to allow index

## Development Setup
same as production except
Parameters are:
- 'project/app/config/parameters/parameters_prod.yml'

First setup can be achieved using:
make setup-dev;


## First setup
Or running the commands:

```bash
    cd project && composer install && cd ..
	project/bin/console doctrine:database:drop --force
	project/bin/console doctrine:database:create
	project/bin/console doctrine:schema:update --force
	project/bin/console doctrine:migrations:migrate --no-interaction;
	project/bin/console doctrine:fixtures:load --no-interaction;
```
