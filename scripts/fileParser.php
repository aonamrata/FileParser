<?php

require_once __DIR__ . '/../vendor/autoload.php';

use \FileParser\Service\Readers\ReaderFactory;
use FileParser\Service\BasicValidator;
use FileParser\Service\DataFinder;
use \FileParser\Service\OutputWriters\StdOutputWriter;
use FileParser\Service\Util\FileOperations;

/*
 * Instructions to run:
 * php /scripts/fileParser.php <file> find-by-id <id>
 * Example: 
 * php /scripts/fileParser.php items.csv find-by-id 68-OX-YH94
 */

if (!(count($argv) == 3 && in_array($argv[2], array("find-all", "group-by-category"))) 
    && count($argv) != 4
) {
    echo "Invalid option passed!!\n";
    echo "Instructions to run: \n php /scripts/fileParser.php <filepath> find-by-id <id>\n";
    die();
}

//Just for readibility;
$fileToRead = $argv[1];
$filterName = $argv[2];
$filterValue = (isset($argv[3]) ? $argv[3] : NULL);


if (!FileOperations::fileExists($fileToRead)) {
    echo "File {$fileToRead} is invalid. Cannot read from it.";
    die();
}

try {
    $reader = ReaderFactory::getReaderForFile($fileToRead);
    // All input-process-output are independent and pluggable as required
    $rawData = $reader->readFromSource($fileToRead);
    $validator = new BasicValidator();
    $cleanData = $validator->getValidData($rawData);
    $finder = new DataFinder($filterName, $filterValue);
    $matchData = $finder->getMachingRecords($cleanData);
    $writer = new StdOutputWriter();
    $writer->writeResult($matchData);
} catch (Exception $exec) {
    echo "ERROR:: " . $exec->getMessage();
    die();
}