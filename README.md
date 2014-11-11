BsbDoctrineMysqlSpacial
=======================

BsbDoctrineMysqlSpacial is a ZF2 module that provides basic MySQL spatial data functionality.

## Installation

BsbDoctrineMysqlSpacial installs with Composer. To install it into your project, just add the following line into your project composer.json file:

```
"require": {
    "bushbaby/bsb-doctrine-mysql-spacial": "~1.0"
}
```

Update your project by runnning `composer.phar` update.

Finally enable the module by adding BsbDoctrineMysqlSpacial in your application.config.php file.

## Configuration

After you enable the module doctrine is capable of using the provided extensions. However it only does this for orm_default.

To enable it for other named connections copy `config/bsb-doctrine-mysql-spacial.global.php.dist` to the `config\autoload` directory of your project and modify it to include the appropiate named information.

## Usage

to do

## Note

Many thanks and credits should go [http://codeutopia.net](http://codeutopia.net/blog/2011/02/19/using-spatial-data-in-doctrine-2/) as this module is basicly a paste-n-copy implementation.