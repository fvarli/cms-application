<?php

class Testimonials_model extends MY_Model {

    public $tableName = "testimonials";

    public function __construct()
    {
        parent::__construct();
        $this->tableName = "testimonials";
    }
}