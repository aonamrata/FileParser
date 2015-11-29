<?php

namespace FileParser\Service;

use Exception;

/**
 * Description of DataFinder
 *
 * @author Namrata
 */
class DataFinder {

    protected $filterName, $filterValue;

    const FILTER_BY_ID = "find-by-id";
    const FILTER_NONE = "find-all";
    const FILTER_BY_CATEGORY = "find-by-category";

    public function __construct($filterName, $filterValue = NULL) {
        $this->filterName = $filterName;
        $this->filterValue = $filterValue;
    }

    public function getMachingRecords(Array $data) {
        if ($this->filterName == self::FILTER_BY_ID) {
            return $this->filterById($data);
        }

        if ($this->filterName == self::FILTER_BY_CATEGORY) {
            return $this->filterByCategory($data);
        }

        if ($this->filterName == self::FILTER_NONE) {
            return $data;
        }

        throw new Exception("Invalid find option. Cannot filter by {$this->filterName}");
    }

    protected function filterById($data) {
        foreach ($data as $key => $eachRecord) {
            if ($eachRecord[0] !== $this->filterValue) {
                unset($data[$key]);
            }
        }
        return $data;
    }

    protected function filterByCategory($data) {
        foreach ($data as $key => $eachRecord) {
            if (!in_array($this->filterValue, $eachRecord[3])) {
                unset($data[$key]);
            }
        }
        return $data;
    }

}
