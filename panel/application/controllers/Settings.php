<?php

class Settings extends MY_Controller{

    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "settings_view";
        $this->load->model("settings_model");

        if(!get_active_user()){
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $viewData = new stdClass();

        //get all data
        $item = $this->settings_model->get_row();
        //print_r($item); die();

        if($item){

            $viewData->subViewFolder = "update";
        }
        else{
            $viewData->subViewFolder = "no_content";
        }

        //steps for data will be sent to view
        $viewData->viewFolder = $this->viewFolder;
        $viewData->item = $item;

        //print_r($items);die();
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function add_new_settings()
    {

        $viewData =new stdClass();

        //steps for data will be added
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    // TODO learn how it works Lecture 100
    public function save_settings()
    {

        $this->load->library("form_validation");


        if($_FILES["logo"]["name"] == ""){

            $alert = array(
                "title" => "Error",
                "text" => "Please choose an image for desktop",
                "type"  => "error"
            );

            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("settings/add_new_settings"));

            die();
        }


        if($_FILES["mobile_logo"]["name"] == ""){

            $alert = array(
                "title" => "Error",
                "text" => "Please choose an image for mobile",
                "type"  => "error"
            );

            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("settings/add_new_settings"));

            die();
        }



        if($_FILES["favicon"]["name"] == ""){

            $alert = array(
                "title" => "Error",
                "text" => "Please choose an image for favicon",
                "type"  => "error"
            );

            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("settings/add_new_settings"));

            die();
        }

        $this->form_validation->set_rules("company_name", "Company Name", "required|trim");
        $this->form_validation->set_rules("phone_1", "Phone 1", "required|trim");
        $this->form_validation->set_rules("email", "Your Company Email Address", "required|trim|valid_email");

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> should be filled.",
                "valid_email"  => "<b>{field}</b> should be entered correctly."
            )
        );

        $validate = $this->form_validation->run();

        if($validate){


            $file_name = convertToSEO($this->input->post("company_name")) . "." . pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);

            $image_150x35 = upload_picture_to_size($_FILES["logo"]["tmp_name"],"uploads/$this->viewFolder/", 150,35, $file_name);

            $image_300x70 = upload_picture_to_size($_FILES["mobile_logo"]["tmp_name"],"uploads/$this->viewFolder/", 300,70, $file_name);

            $image_32x32 = upload_picture_to_size($_FILES["favicon"]["tmp_name"],"uploads/$this->viewFolder/", 32,32, $file_name);

            if($image_150x35 && $image_300x70 && $image_32x32){

                $insert = $this->settings_model->add_db(
                    array(
                        "company_name"  => $this->input->post("company_name"),
                        "phone_1"       => $this->input->post("phone_1"),
                        "phone_2"       => $this->input->post("phone_2"),
                        "fax_1"         => $this->input->post("fax_1"),
                        "fax_2"         => $this->input->post("fax_2"),
                        "address"       => $this->input->post("address"),
                        "about_us"      => $this->input->post("about_us"),
                        "mission"       => $this->input->post("mission"),
                        "vision"        => $this->input->post("vision"),
                        "email"         => $this->input->post("email"),
                        "facebook"      => $this->input->post("facebook"),
                        "twitter"       => $this->input->post("twitter"),
                        "instagram"     => $this->input->post("instagram"),
                        "linkedin"      => $this->input->post("linkedin"),
                        "logo"          => $file_name,
                        "mobile_logo"          => $file_name,
                        "favicon"          => $file_name,
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

            } else {

                $alert = array(
                    "title" => "Error",
                    "text" => "It didn't work.",
                    "type"  => "error"
                );

                $this->session->set_flashdata("alert", $alert);

                redirect(base_url("settings/add_new_settings"));

                die();

            }

            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("settings"));

        } else {

            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    public function update_existing_settings($id)
    {
        $viewData =new stdClass();

        $item = $this->settings_model->get_row(
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

    // TODO update doesn't work  - Lecture 102 - 246
    public function update_settings($id)
    {
        $this->load->library("form_validation");


        $this->form_validation->set_rules("company_name", "Company Name", "required|trim");
        $this->form_validation->set_rules("phone_1", "Phone 1", "required|trim");
        $this->form_validation->set_rules("email", "Your Company Email Address", "required|trim|valid_email");

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> should be filled.",
                "valid_email"  => "<b>{field}</b> should be entered correctly."
            )
        );

        $validate = $this->form_validation->run();

        if($validate){

            $data = array(
                "company_name"  => $this->input->post("company_name"),
                "phone_1"       => $this->input->post("phone_1"),
                "phone_2"       => $this->input->post("phone_2"),
                "fax_1"         => $this->input->post("fax_1"),
                "fax_2"         => $this->input->post("fax_2"),
                "address"       => $this->input->post("address"),
                "about_us"      => $this->input->post("about_us"),
                "mission"       => $this->input->post("mission"),
                "vision"        => $this->input->post("vision"),
                "email"         => $this->input->post("email"),
                "facebook"      => $this->input->post("facebook"),
                "twitter"       => $this->input->post("twitter"),
                "instagram"     => $this->input->post("instagram"),
                "linkedin"      => $this->input->post("linkedin"),
                "updatedAt"     => date("Y-m-d H:i:s")
            );

            // Upload Process - Desktop...
            if($_FILES["logo"]["name"] !== "") {

                $file_name = convertToSEO($this->input->post("company_name")) . "." . pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);

                $image_150x35 = upload_picture_to_size($_FILES["logo"]["tmp_name"],"uploads/$this->viewFolder/", 150,35, $file_name);

                if($image_150x35){

                    $data["logo"] = $file_name;

                } else {

                    $alert = array(
                        "title" => "Error",
                        "text" => "It didn't work. - Desktop image couldn't be uploaded.",
                        "type"  => "error"
                    );

                    $this->session->set_flashdata("alert", $alert);

                    redirect(base_url("settings/update_existing_settings/$id"));

                    die();

                }

            }

            // Upload Process - Mobile...
            if($_FILES["mobile_logo"]["name"] !== "") {

                $file_name = convertToSEO($this->input->post("company_name")) . "." . pathinfo($_FILES["mobile_logo"]["name"], PATHINFO_EXTENSION);

                $image_300x70 = upload_picture_to_size($_FILES["mobile_logo"]["tmp_name"],"uploads/$this->viewFolder/", 300,70, $file_name);

                if($image_300x70){

                    $data["mobile_logo"] = $file_name;

                } else {

                    $alert = array(
                        "title" => "Error",
                        "text" => "It didn't work. - Mobile image couldn't be uploaded.",
                        "type"  => "error"
                    );

                    $this->session->set_flashdata("alert", $alert);

                    redirect(base_url("settings/update_existing_settings/$id"));

                    die();

                }

            }

            // Upload Process - Favicon...
            if($_FILES["favicon"]["name"] !== "") {

                $file_name = convertToSEO($this->input->post("company_name")) . "." . pathinfo($_FILES["favicon"]["name"], PATHINFO_EXTENSION);

                $image_32x32 = upload_picture_to_size($_FILES["favicon"]["tmp_name"],"uploads/$this->viewFolder/", 150,35, $file_name);

                if($image_32x32){

                    $data["favicon"] = $file_name;

                } else {

                    $alert = array(
                        "title" => "Error",
                        "text" => "It didn't work. - Favicon image couldn't be uploaded.",
                        "type"  => "error"
                    );

                    $this->session->set_flashdata("alert", $alert);

                    redirect(base_url("settings/update_existing_settings/$id"));

                    die();

                }

            }

            $update = $this->settings_model->update_db(array("id" => $id), $data);

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

            //updating session process
            $settings = $this->settings_model->get_row();
            $this->session->set_userdata("settings", $settings);

            // type session, result of process
            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("settings"));

        } else {

            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;

            $viewData->item = $this->settings_model->get_row(
                array(
                    "id"    => $id,
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

}
