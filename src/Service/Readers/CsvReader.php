<?php

namespace FileParser\Service\Readers;

use Exception;

/**
 * Description of CsvReader
 *
 * @author Namrata
 */
class CsvReader implements IReader {

    /**
     * 
     * @param string $path
     * @return Array eg: array( array("id","name",qty, array(categoy), ..)
     * @throws Exception
     */
    public function readFromSource($path) {
        if (($handle = fopen($path, "r")) === FALSE) {
            throw new Exception("Failed to read $path");
        }
        $data = array();
        while ($row = fgetcsv($handle)) {
            $row[3] = explode(";", $row[3]);
            $data[] = $row;
        }
        return $data;
    }

}
