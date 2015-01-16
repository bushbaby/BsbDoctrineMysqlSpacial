BsbDoctrineMysqlSpacial
=======================

BsbDoctrineMysqlSpacial is a ZF2 module that provides basic MySQL spatial data functionality.

[![Latest Stable Version](https://poser.pugx.org/bushbaby/bsb-doctrine-mysql-spacial/v/stable.svg)](https://packagist.org/packages/bushbaby/bsb-doctrine-mysql-spacial)
[![Total Downloads](https://poser.pugx.org/bushbaby/bsb-doctrine-mysql-spacial/downloads.svg)](https://packagist.org/packages/bushbaby/bsb-doctrine-mysql-spacial)
[![Latest Unstable Version](https://poser.pugx.org/bushbaby/bsb-doctrine-mysql-spacial/v/unstable.svg)](https://packagist.org/packages/bushbaby/bsb-doctrine-mysql-spacial)
[![License](https://poser.pugx.org/bushbaby/bsb-doctrine-mysql-spacial/license.svg)](https://packagist.org/packages/bushbaby/bsb-doctrine-mysql-spacial)

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bushbaby/BsbDoctrineMysqlSpacial/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bushbaby/BsbDoctrineMysqlSpacial/?branch=master)
[![Dependency Status](https://www.versioneye.com/user/projects/54b9886f879d51e9aa000002/badge.svg?style=flat)](https://www.versioneye.com/user/projects/54b9886f879d51e9aa000002)

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