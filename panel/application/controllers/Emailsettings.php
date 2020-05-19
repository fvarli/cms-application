<?php

class Emailsettings extends MY_Controller{

    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "email_settings_view";
        $this->load->model("emailsettings_model");

        if(!get_active_user()){
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $viewData = new stdClass();

        //get all data
        $items = $this->emailsettings_model->get_all();
        /*print_r($items); die();*/

        //steps for data will be sent to view
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

       // print_r($items); die();
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function add_new_email()
    {

        $viewData =new stdClass();

        //steps for data will be added
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    // TODO learn how it works Lecture 100
    public function save_new_email()
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

        $this->form_validation->set_rules("user_name", "User Name", "required|trim");
        $this->form_validation->set_rules("host", "Email Server Name", "required|trim");
        $this->form_validation->set_rules("port", "Port Number", "required|trim");
        $this->form_validation->set_rules("user_name", "Email Title", "required|trim");
        $this->form_validation->set_rules("user", "Email User Address", "required|trim|valid_email");
        $this->form_validation->set_rules("from", "Email From", "required|trim|valid_email");
        $this->form_validation->set_rules("to", "Email To", "required|trim|valid_email");
        $this->form_validation->set_rules("password", "Email Password", "required|trim");

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> should be filled.",
                "valid_email"  => "<b>{field}</b> is already existed.",
            )
        );

        $validate = $this->form_validation->run();

        if($validate){

            $insert = $this->emailsettings_model->add_db(
                array(
                    "protocol"     => $this->input->post("user_name"),
                    "host"     => $this->input->post("host"),
                    "port"     => $this->input->post("port"),
                    "user_name"     => $this->input->post("user_name"),
                    "user"     => $this->input->post("user"),
                    "from"         => $this->input->post("from"),
                    "to"         => $this->input->post("to"),
                    "password"      => md5($this->input->post("password")),
                    "isActive"      => 1,
                    "createdAt"     => date("Y-m-d H:i:s")
                )
            );

            if($insert){

                $alert = array(
                    "title" => "Succes",
                    "text" => "Record has been added.",
                    "type"  => "success"
                );

            } else {

                $alert = array(
                    "title" => "Error",
                    "text" => "Record couldn't added.",
                    "type"  => "error"
                );
            }

            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("emailsettings"));

            die();

        } else {

            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }



    }

    public function update_existing_email($id)
    {
        $viewData =new stdClass();

        $item = $this->emailsettings_model->get_row(
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

    // TODO check protocol name and user name, those sections save wrong
    public function update_email($id)
    {
        $this->load->library("form_validation");

        $this->form_validation->set_rules("user_name", "User Name", "required|trim");
        $this->form_validation->set_rules("host", "Email Server Name", "required|trim");
        $this->form_validation->set_rules("port", "Port Number", "required|trim");
        $this->form_validation->set_rules("user_name", "Email Title", "required|trim");
        $this->form_validation->set_rules("user", "Email User Address", "required|trim|valid_email");
        $this->form_validation->set_rules("from", "Email From", "required|trim|valid_email");
        $this->form_validation->set_rules("to", "Email To", "required|trim|valid_email");
        $this->form_validation->set_rules("password", "Email Password", "required|trim");

        $this->emailsettings_model->get_row(
            array(
                "id" => $id
            )
        );


        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> should be filled.",
                "is_unique"  => "<b>{field}</b> is already existed.",
                "valid_email"  => "<b>{field}</b> is already existed."
            )
        );

        $validate = $this->form_validation->run();

        if($validate){

            $update = $this->emailsettings_model->update_db(
                array(
                    "id" => $id
                ),
                array(
                    "protocol"     => $this->input->post("user_name"),
                    "host"     => $this->input->post("host"),
                    "port"     => $this->input->post("port"),
                    "user_name"     => $this->input->post("user_name"),
                    "user"     => $this->input->post("user"),
                    "from"         => $this->input->post("from"),
                    "to"         => $this->input->post("to"),
                    "password"      => $this->input->post("password"),
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

            redirect(base_url("emailsettings"));

        } else {

            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;

            $viewData->item = $this->emailsettings_model->get_row(
                array(
                    "id"    => $id,
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    public function delete_record($id){

        $delete = $this->emailsettings_model->delete_record(
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
        redirect(base_url("emailsettings"));

    }

    public function isActiveSetter($id)
    {
        if(!is_allowed_update_module()){
            die();
        }

        if($id){
            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->emailsettings_model->update_db(
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
