<?php

class MY_Model extends CI_Model{

    public $tableName;

    public function __construct()
    {
        parent::__construct();
    }

    //get all record
    public function get_all($where = array(), $order = "id ASC")
    {
        $res = $this
            ->db
            ->where($where)
            ->order_by($order)
            ->get($this->tableName)->result();
        return $res;
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
        if(is_allowed_write_module()){
            return $this->db->insert($this->tableName, $data);
        }else{
            return false;
        }
    }

    //update the record
    public function update_db($where = array(), $data = array())
    {
        if(is_allowed_update_module()){
            return $this->db->where($where)->update($this->tableName, $data);
        }else{
            return false;
        }
    }

    public function delete_record($where = array())
    {
        if(is_allowed_delete_module()){
        return $this->db->where($where)->delete($this->tableName);
        }else{
            return false;
        }
    }

}