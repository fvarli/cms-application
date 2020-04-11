<?php

class Courses_model extends CI_Model {

    public $tableName = "courses";

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
        $this->db->set($data);
        return $this->db->insert($this->tableName);
    }

    //update the record
    public function update_db($where = array(), $data = array())
    {
        return $this->db->where($where)->update($this->tableName, $data);
    }

    public function deleteNews($where = array()){

        return $this
            ->db
            ->where($where)
            ->delete($this->tableName);

        /* $res = $this
                       ->db
                       ->where($where)
                       ->delete("courses");

               return $res;*/
    }
}
