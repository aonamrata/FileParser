<?php

namespace FileParser\Service\Util;

/**
 * Description of FileOperations
 *
 * @author Namrata
 */
class FileOperations {
    
    public static function fileExists($path) {
        if (!file_exists($path) || !is_file($path)) {
            return FALSE;
        }
        return TRUE;
    }
}
