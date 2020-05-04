<?php

class Popups extends CI_Controller{

    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "popups_view";
        $this->load->model("popups_model");

        if(!get_active_user()){
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $viewData = new stdClass();

        //get all data
        $items = $this->popups_model->get_all(array());
        /*print_r($items); die();*/

        //steps for data will be sent to view
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

       // print_r($items); die();
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function add_new_popup()
    {
        $viewData =new stdClass();

        //steps for data will be added
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    public function save_new_popup()
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
        $this->form_validation->set_rules("page", "Related Page", "required|trim");

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> should be filled."
            )
        );

        $validate = $this->form_validation->run();

        if($validate){

            $insert = $this->popups_model->add_db(
                array(
                    "title"         => $this->input->post("title"),
                    "description"         => $this->input->post("description"),
                    "page"         => $this->input->post("page"),
                    "popup_unique_id" => uniqid(),
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

            redirect(base_url("popups"));

        } else {

            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }

    public function update_existing_popup($id)
    {
        $viewData =new stdClass();

        $item = $this->popups_model->get_row(
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

    public function update_popup($id)
    {
        $this->load->library("form_validation");


        $this->form_validation->set_rules("title", "Title", "required|trim");
        $this->form_validation->set_rules("page", "Related Page", "required|trim");

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> should be filled."
            )
        );

        $validate = $this->form_validation->run();

        if($validate){

            $data= array(
                "title"         => $this->input->post("title"),
                "description"         => $this->input->post("description"),
                "page"         => $this->input->post("page")
            );


            $update = $this->popups_model->update_db(array("id" => $id), $data);

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

            redirect(base_url("popups"));

        } else {

            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;

            $viewData->item = $this->popups_model->get_row(
                array(
                    "id"    => $id,
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    public function delete_popup($id){

        $delete = $this->popups_model->delete_popup(
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
        redirect(base_url("popups"));

    }

    public function isActiveSetter($id)
    {
        if($id){
            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->popups_model->update_db(
                array(
                    "id" => $id
                ),
                array(
                    "isActive" => $isActive
                )
            );
        }
    }


}
