Readme
======


====================================
Production/Testing Environment Setup
====================================

- Apache, PHP, Mysql install

- Copy Framework directory to website

- Open install\index.php and follow the instructions


=============================
Development Environment Setup
=============================
Code check: (Run in server)
> cd /var/www/html/framework
> phploc src
> phpcpd src
> phpmd src text cleancode,codesize,controversial,design,naming,unusedcode
> phpcs src

> rm -r phpdoc
> phpdoc -t phpdoc -d . --template="responsive-twig"


================
Fitnesse Testing
================

-> Download least release from http://fitnesse.org/FitNesseDownload to /tmp


cd /tmp
sudo mkdir /var/fitnesse
sudo mv fitnesse-standalone.jar /var/fitnesse
cd /var/fitnesse/
sudo wget https://cloud.github.com/downloads/ggramlich/phpslim/phpslim.phar
java -jar fitnesse-standalone.jar -p 8086 &

-> Browser: http://ip:8086
-> Add -> Test -> TestController

>>>>> Test <<<<<
!define TEST_RUNNER (/var/fitnesse/phpslim.phar)
!define COMMAND_PATTERN (php %m /Applications/mampstack-5.4.40-0/apache2/htdocs/mvc/fitnesse)
!define TEST_SYSTEM {slim}

!|Login                    |
|username|password |result?|
|peter   |peter    |true   |
|peter   |wrongpass|false  |
|peter   |         |false  |
|john    |peter    |false  |
|        |         |false  |
|        |peter    |false  |
|        |PETER    |false  |
|PETER   |peter    |true   |
>>>>> Test <<<<<

-> Browser: http://ip:8086/FrontPage.TestController