<?php

class Users_roles_model extends MY_Model {

    public function __construct()
    {
        parent::__construct();
        $this->tableName = "user_roles";
    }

}