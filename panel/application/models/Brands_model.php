<?php

class Brands_model extends MY_Model {

    public function __construct()
    {
        parent::__construct();
         $this->tableName = "brands";
    }


}