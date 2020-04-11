<?php

class Home extends CI_Controller{

    public $view_folder = "";
    public function __construct()
    {
        parent::__construct();
        $this->view_folder = "homepage";
        
    }

    public function index()
    {
        echo $this->view_folder;
    }

    public function product_list()
    {
        $view_data = new stdClass();

        $this->load->model("products_model");

        $this->load->helper("tools");
        $this->load->helper("text");

        $view_data->products = $this->products_model->get_all(
          array(
              "isActive" => 1
          ), "rank ASC"
        );

        //echo get_product_cover_image(46);die();
        //print_r($view_data->products); die();

        $view_data->view_folder = "product_list_view";

        $this->load->view($view_data->view_folder, $view_data);
    }

    public function product_detail()
    {
        $view_data = new stdClass();

        $this->load->model("products_model");
        $view_data->view_folder = "product_view";

        $this->load->helper("tools");
        $this->load->helper("text");

        $view_data->products = $this->products_model->get_all(
          array(
              "isActive" => 1
          ), "rank ASC"
        );

        //echo get_product_cover_image(46);die();
        //print_r($view_data->products); die();

        $this->load->view($view_data->view_folder, $view_data);
    }
}