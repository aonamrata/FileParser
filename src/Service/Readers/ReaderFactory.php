<?php

namespace FileParser\Service\Readers;

use Exception;

/**
 * Description of ReaderFactory
 *
 * @author Namrata
 */
class ReaderFactory {

    public static function getReaderForFile($file) {
        $extension = pathinfo($file, PATHINFO_EXTENSION);
        if ($extension == "csv") {
            return new CsvReader();
        } else if ($extension == "nl") {
            return new NlReader();
        } else {
            throw new Exception("No Reader found for Extension $extension");
        }
    }

}
