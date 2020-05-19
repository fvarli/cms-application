<?php

class MY_Controller extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

        if(!is_allowed_review_module()){
            redirect(base_url());
        }
    }
}