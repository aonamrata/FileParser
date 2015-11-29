# FileParser
parsing data out of files that contain items from a store, you should be able to retrieve specific pieces of the data


# Instructions to run all example cases for item.csv as bash script from the root folder:

 -- ` sh runExamples.sh`


# Instructions to run individual cmd from the root folder:

## Find By ID:

 -- `php scripts/fileParser.php <file> find-by-id <id> `
 -- Example: 
 -- `php scripts/fileParser.php "D:\googledrive\documents\OTHER_TEAMS\NESS_INTERVIEW\php-candidate-test-master\items.csv" find-by-id 68-OX-YH94`
 
## Find ALL:
 -- `php scripts/fileParser.php <file> find-all `
 -- Example: 
 -- `php scripts/fileParser.php "D:\googledrive\documents\OTHER_TEAMS\NESS_INTERVIEW\php-candidate-test-master\items.csv" find-all`
 
## Find By Category:
 -- `php scripts/fileParser.php <file> find-by-category <cat-id>`
 -- Example: 
 -- `php scripts/fileParser.php "D:\googledrive\documents\OTHER_TEAMS\NESS_INTERVIEW\php-candidate-test-master\items.csv" find-by-category a`
 
 