<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace FileParser\Service\Readers;

/**
 * Description of IReader
 *
 * @author Namrata
 */
interface IReader {

    public function doesSourceExist($path);

    public function readFromSource($path);
//    
//    public function validateData(); 
//    public function getValidContent(); //Think this should be in its own service as this is custom business rules
}
