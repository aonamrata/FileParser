# FileParser
parsing data out of files that contain items from a store, you should be able to retrieve specific pieces of the data

# Instructions to setup the repo for use.

* Clone the repo using `git clone https://github.com/aonamrata/FileParser.git`
* Install composer if it is not already installed from https://getcomposer.org/download/
* `cd FileParser`
* Run composer to install all dependencies using this cmd from root dir : `composer install` . This will create vendor folder with all required libraries.
* Run a test using this cmd from root dir `php scripts/fileParser.php` -- It should give `Invalid option passed!!` and not Fatal error.


# Instructions to run all example cases for item.csv as bash script from the root folder:

- ` sh runExamples.sh`


# Instructions to run individual cmd from the root folder:

## Find By ID:

- `php scripts/fileParser.php <file> find-by-id <id> `
- *Example: *
- `php scripts/fileParser.php "items.csv" find-by-id 72-Bx-hb21`
 
## Find ALL:
- `php scripts/fileParser.php <file> find-all `
- *Example: *
- `php scripts/fileParser.php "items.csv" find-all`
 
## Find By Category:
- `php scripts/fileParser.php <file> find-by-category <cat-id>`
- *Example: *
- `php scripts/fileParser.php "items.csv" find-by-category a`
 

# Instructions to run all PHPUnit tests from tests folder:
 
- `$ ../vendor/bin/phpunit phpunit/`