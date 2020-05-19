<?php

class Portfolio_categories extends MY_Controller{

    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "portfolio_categories_view";
        $this->load->model("portfolio_categories_model");

        if(!get_active_user()){
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $viewData = new stdClass();

        //get all data
        $items = $this->portfolio_categories_model->get_all(
            array()
        );
        /*print_r($items); die();*/

        //steps for data will be sent to view
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

        // print_r($items); die();
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function add_new_portfolio_category()
    {

        $viewData =new stdClass();

        //steps for data will be added
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    // TODO update save section Lecture 55
    public function save_new_portfolio_category()
    {
        /*
            $url = $this->input->post("url");
            $title = $this->input->post("title");
            $description = $this->input->post("description");

            $data = array(
                "url" => $url,
                "title" => $title,
                "description" => $description
            );

            $insert = $this
                ->db
                ->insert("products",$data);

            if($insert){
                redirect(base_url("Products/index"));
            }else{
                echo "record process failed";
            }
    */
        $this->load->library("form_validation");

        $this->form_validation->set_rules("title", "Title", "required|trim");

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> should be filled."
            )
        );

        $validate = $this->form_validation->run();

        if($validate){

            $insert = $this->portfolio_categories_model->add_db(
                    array(
                        "title"         => $this->input->post("title"),
                        "isActive"      => 1,
                        "createdAt"     => date("Y-m-d H:i:s")
                    )
                );

                if($insert){

                    $alert = array(
                        "title" => "Success",
                        "text" => "Record has been added.",
                        "type"  => "success"
                    );

                } else {

                    $alert = array(
                        "title" => "Error",
                        "text" => "It didn't work.",
                        "type"  => "error"
                 );
            }

            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("portfolio_categories"));

        } else {

            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    public function update_existing_portfolio_category($id)
    {
        $viewData =new stdClass();

        $item = $this->portfolio_categories_model->get_row(
            array(
                "id" => $id
            )
        );

        //steps for data will be added
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    // TODO convertToSEO URL section and test for bugs
    public function update_portfolio_category($id)
    {
        $this->load->library("form_validation");


        $this->form_validation->set_rules("title", "Title", "required|trim");

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> should be filled."
            )
        );

        $validate = $this->form_validation->run();

        if($validate){

            // Upload Process...

            $update = $this->portfolio_categories_model->update_db(
                array(
                    "id" => $id),
                array(
                    "title" => $this->input->post("title"),
                )
            );

            if($update){

                $alert = array(
                    "title" => "Success",
                    "text" => "Record has been added.",
                    "type"  => "success"
                );

            } else {

                $alert = array(
                    "title" => "Error",
                    "text" => "It didn't work.",
                    "type"  => "error"
                );
            }

            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("portfolio_categories"));

        } else {

            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;

            $viewData->item = $this->portfolio_categories_model->get_row(
                array(
                    "id"    => $id,
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    public function delete_record($id){

        $delete = $this->portfolio_categories_model->delete_record(
            array(
                "id" => $id
            )
        );

        if($delete){
            $alert = array(
                "text" => "Record has been deleted!",
                "type" => "success"
            );
        }else{

            $alert = array(
                "text" => "Record couldn't delete!",
                "type" => "error"
            );
        }
        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("portfolio_categories"));

    }

    public function isActiveSetter($id)
    {
        if($id){
            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->portfolio_categories_model->update_db(
                array(
                    "id" => $id
                ),
                array(
                    "isActive" => $isActive
                )
            );
        }
    }

    public function update_existing_image($id)
    {
        //steps for data will be added
        $viewData = new stdClass();

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "images";

        $viewData->item = $this->portfolio_categories_model->get_row(
            array(
                "id" => $id
            )
        );

        $viewData->item_images = $this->portfolio_categories_image_model->get_all(
            array(
                "product_id" => $id
            ),
            "rank ASC"
        );

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

}
