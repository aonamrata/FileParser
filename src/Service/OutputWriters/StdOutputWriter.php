<?php

namespace FileParser\Service\OutputWriters;

/**
 * Description of StdOutputWriter
 *
 * @author Namrata
 */
class StdOutputWriter implements IWriter {

    public function writeResult($data) {
        if (empty($data)) {
            echo PHP_EOL . "No results found..";
            return;
        }
        //not static as some other writer might need constructor for init of connection configs
        echo PHP_EOL;
        foreach ($data as $eachRecord) {
            echo "{$eachRecord[0]} {$eachRecord[1]} ({$eachRecord[2]})" . PHP_EOL;
            if (count($eachRecord[3]) > 0) {
                echo "- " . (implode(PHP_EOL . "- ", $eachRecord[3])) . PHP_EOL;
            }
            echo PHP_EOL;
        }
        echo PHP_EOL;
    }

}
