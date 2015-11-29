<?php

namespace FileParser\Service\Readers;

use Exception;

/**
 * Description of CsvReader
 *
 * @author Namrata
 */
class CsvReader implements IReader {

    public function doesSourceExist($path) {
        if (!file_exists($path) || !is_file($path)) {
            return FALSE;
        }
        return TRUE;
    }

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
