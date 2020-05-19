<?php

class Slides_model extends MY_Model {

    public $tableName = "slides";

    public function __construct()
    {
        parent::__construct();
        $this->tableName = "slides";
    }

}