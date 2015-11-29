<?php

namespace FileParser\Service;

/**
 * Description of Validators
 *
 * @author Namrata
 */
class BasicValidator {

    public function getValidData(Array $fullData) {
        $validData = array();
        foreach ($fullData as $eachRow) {
            //there will always be 4 fields per line: id, name, qty, categories
            if ($this->isIdValid($eachRow[0]) && $this->isNameValid($eachRow[1]) && $this->isQuantityValid($eachRow[2]) && $this->isNotDuplicateId($eachRow[0], $validData)
            ) {
                $eachRow[3] = $this->getValidCategories($eachRow[3]);
                $validData[] = $eachRow;
            }
        }
        return $validData;
    }

    protected function isIdValid($id) {
        if (preg_match("/^\d{2}-[a-z]{2}-[a-z]{2}\d{2}$/i", $id)) {
            return TRUE;
        }
        return FALSE;
    }

    protected function isNotDuplicateId($id, $existingData) {
        if (!in_array($id, array_column($existingData, 0))) {
            return TRUE;
        }
        return FALSE;
    }

    protected function isNameValid($name) {
        if (strlen($name) >= 1) {
            return TRUE;
        }
        return FALSE;
    }

    protected function isQuantityValid($quantity) {

        if (preg_match("/^\d+$/", $quantity) && $quantity > 0) {
            return TRUE;
        }
        return FALSE;
    }

    protected function getValidCategories(Array $categories) {
        return array_filter($categories);
    }

}
