# COVID-19

Website to help collaborate around COVID-19 problems

## DIRECTORY STRUCTURE

```
src/ 				source code
vendors				3rd-party packages
runtime/            contains files generated during runtime
web/				the entry script and Web resources
infracture/			the infrastructure folder (docker/docker-compose setup)
bin/			    scripts
```

## REQUIREMENTS

- PHP >= 7.0.0

## INSTALL

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install this project template using the following command:

```bash
php yii env
make vendors-install
make db-migrate
```

If you want to use docker infra, run:
```bash
infra-up
```
