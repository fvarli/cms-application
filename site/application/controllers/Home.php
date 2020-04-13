<?php

class Home extends CI_Controller{

    public $view_folder = "";
    public function __construct()
    {
        parent::__construct();
        $this->view_folder = "homepage";

        $this->load->helper("tools");
        $this->load->helper("text");
        
    }

    public function index()
    {
        echo $this->view_folder;
    }

    public function product_list()
    {
        $view_data = new stdClass();

        $this->load->model("products_model");

        $view_data->products = $this->products_model->get_all(
          array(
              "isActive" => 1
          ), "rank ASC"
        );

        //echo get_product_cover_image(56);die();
        //print_r($view_data->products); die();

        $view_data->view_folder = "product_list_view";

        $this->load->view($view_data->view_folder, $view_data);
    }

    public function product_detail($url = "")
    {
        $view_data = new stdClass();

        $this->load->model("products_model");
        $this->load->model("products_image_model");
        $view_data->view_folder = "product_view";


        $view_data->product = $this->products_model->get_row(
            array(
                "isActive" => 1,
                "url" => $url
            )
        );

        $view_data->product_images = $this->products_image_model->get_all(
            array(
                "isActive" => 1,
                "product_id" => $view_data->product->id
            ), "rank ASC"
        );
        //print_r($view_data->product_images); die();

        $view_data->other_products = $this->products_model->get_all(
          array(
              "isActive" => 1,
              "id !=" => $view_data->product->id
          ), "rand()", array("start" => 0, "count" =>3)
        );

        //echo get_product_cover_image(46);die();
        //print_r($view_data->products); die();

        $this->load->view($view_data->view_folder, $view_data);
    }

    public function portfolio_list()
    {
        $view_data = new stdClass();

        $this->load->model("portfolios_model");

        $view_data->portfolios = $this->portfolios_model->get_all(
            array(
                "isActive" => 1
            ), "rank ASC"
        );

        //echo get_product_cover_image(56);die();
        //print_r($view_data->portfolios); die();

        $view_data->view_folder = "portfolio_list_view";

        $this->load->view($view_data->view_folder, $view_data);
    }

    public function portfolio_detail($portfolio_url = "")
    {

        $view_data = new stdClass();

        $this->load->model("portfolios_model");
        $this->load->model("portfolios_image_model");
        $view_data->view_folder = "portfolio_view";

        $view_data->portfolio = $this->portfolios_model->get_row(
            array(
                "isActive" => 1,
                "portfolio_url" => $portfolio_url
            )
        );
        //print_r($view_data->portfolio);die();

        $view_data->portfolio_images = $this->portfolios_image_model->get_all(
            array(
                "isActive" => 1,
                "portfolio_id" => $view_data->portfolio->id
            ), "rank ASC"
        );
        //print_r($view_data->portfolio_images); die();

        $view_data->other_portfolios= $this->portfolios_model->get_all(
            array(
                "isActive" => 1,
                "id !=" => $view_data->portfolio->id
            ), "rand()", array("start" => 0, "count" =>3)
        );

        //echo get_product_cover_image(46);die();
        //print_r($view_data->other_portfolio); die();

        $this->load->view($view_data->view_folder, $view_data);
    }

    public function course_list()
    {
        $view_data = new stdClass();

        $this->load->model("courses_model");

        $view_data->courses = $this->courses_model->get_all(
            array(
                "isActive" => 1
            ), "event_date ASC"
        );

        //echo get_product_cover_image(56);die();
        //print_r($view_data->courses); die();

        $view_data->view_folder = "course_list_view";

        $this->load->view($view_data->view_folder, $view_data);
    }

    public function course_detail($url = "")
    {
        // echo $url; die();

        $view_data = new stdClass();

        $this->load->model("courses_model");
        $view_data->view_folder = "course_view";

        $view_data->course = $this->courses_model->get_row(
            array(
                "isActive" => 1,
                "url" => $url
            )
        );
        //print_r($view_data->course);die();


        $view_data->other_courses = $this->courses_model->get_all(
            array(
                "isActive" => 1,
                "id !=" => $view_data->course->id
            ), "rand()", array("start" => 0, "count" =>3)
        );

        //print_r($view_data->other_courses); die();

        $this->load->view($view_data->view_folder, $view_data);
    }
}