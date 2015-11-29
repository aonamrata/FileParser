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
            echo "No results found.\n";
            return;
        }
        //not static as some other writer might need constructor for init of connection configs
        foreach ($data as $key => $eachRecord) {
            echo "{$eachRecord[0]} {$eachRecord[1]} ({$eachRecord[2]})\n";
            if (count($eachRecord[3]) > 0) {
                echo "- " . (implode("\n- ", $eachRecord[3])) . "\n";
            }
            
            if($key < count($data)-1) {
                echo "\n";
            }
        }
    }

}
