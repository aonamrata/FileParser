<?php

namespace FileParser\Service\Readers;

use Exception;

/**
 * Description of NlReader
 *
 * @author Namrata
 */
class NlReader implements IReader {

    public function doesSourceExist($path) {
        //This is exact same as CSV, so maybe we can have a abstract FilebaseReader and move this there
        if (!file_exists($path) || !is_file($path)) {
            return FALSE;
        }
        return TRUE;
    }

    public function readFromSource($path) {
        if (($handle = fopen($path, "r")) === FALSE) {
            throw new Exception("Failed to read $path");
        }
        $fileData = file($path, FILE_IGNORE_NEW_LINES);
        //Each set of 4 lines is 1 record
        $allRecordChunks = array_chunk($fileData, 4);
        foreach ($allRecordChunks as $key => $eachRecord) {
            $allRecordChunks[$key][3] = explode(";", $eachRecord[3]);
        }
        return $allRecordChunks;
    }

}
