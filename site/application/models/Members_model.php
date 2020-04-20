<?php

class Members_model extends CI_Model {

    public $tableName = "members";

    public function __construct()
    {
        parent::__construct();
    }


    //add a new record to database
    public function add_db($data = array())
    {
        $this->db->set($data);
        return $this->db->insert($this->tableName);
    }
}
