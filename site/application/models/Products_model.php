<?php

class Products_model extends CI_Model {

    public $tableName = "products";

    public function __construct()
    {
        parent::__construct();
    }

    //get all record
    public function get_all($where = array(), $order = "id ASC", $limit = array("count" =>0, "start" => 0))
    {
        $this->db->where($where)->order_by($order);
        if(!empty($limit))
            $this->db->limit($limit["count"], $limit["start"]);
        return $this->db->get($this->tableName)->result();
    }

    public function get_row($where = array())
    {
        return $this
        ->db
        ->where($where)
        ->get($this->tableName)->row();
    }

    //add a new record to database
    public function add_db($data = array())
    {
        $this->db->set($data);
        return $this->db->insert($this->tableName);
    }

    //update the record
    public function update_db($where = array(), $data = array())
    {
        return $this->db->where($where)->update($this->tableName, $data);
    }

    public function deleteProduct($where = array()){
        
        $res = $this
                ->db
                ->where($where)
                ->delete($this->tableName);

        return $res;
    }
}