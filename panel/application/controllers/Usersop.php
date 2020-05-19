<?php

class Usersop extends CI_Controller{

    public $viewFolder="";

    public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "users_view";
        $this->load->model("users_model");
    }

    public function login()
    {
        if(get_active_user()){
            redirect(base_url());
        }

        $viewData = new stdClass();

        $this->load->library("form_validation");


        //steps for data will be added
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "login";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function do_login()
    {
        if(get_active_user()){
            redirect(base_url());
        }

        $this->load->library("form_validation");


        $this->form_validation->set_rules("user_email", "Email", "required|trim|valid_email");
        $this->form_validation->set_rules("user_password", "Password", "required|trim|min_length[8]|max_length[24]");


        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> should be filled.",
                "valid_mail"  => "<b>{field}</b> should be filled.",
                "min_length"  => "<b>{field}</b> should be filled.",
                "max_length"  => "<b>{field}</b> should be matched.",
            )
        );

        $validate = $this->form_validation->run();

        if($this->form_validation->run() == FALSE){

            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "login";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

        }else{

            $user = $this->users_model->get_row(
                array(
                    "email"    => $this->input->post("user_email"),
                    "password" => md5($this->input->post("user_password")),
                    "isActive" => 1
                )
            );
            if($user){
                $alert = array(
                    "title" => "Success",
                    "text" => "You are in.",
                    "type" => "success"
                );

                /* Send to session the user permissions */
                set_user_roles();
                /*****************************************/
                $this->session->set_userdata("user", $user);
                $this->session->set_flashdata("alert",$alert);
                redirect(base_url());
            }else{
                $alert = array(
                    "title" => "Error",
                    "text" => "Check your login information.",
                    "type" => "error"
                );
                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("login"));
            }
        }

    }

    public function logout()
    {
        $this->session->unset_userdata("user");
        redirect(base_url("login"));
    }

    public function forget_password()
    {
        if(get_active_user()){
            redirect(base_url());
        }

        $viewData = new stdClass();

        $this->load->library("form_validation");


        //steps for data will be added
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "forget_password";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    // TODO database -
    public function reset_password()
    {
        $this->load->library("form_validation");


        $this->form_validation->set_rules("email", "Email", "required|trim|valid_email");

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> should be filled.",
                "valid_mail"  => "<b>{field}</b> should be filled.",
            )
        );

        if($this->form_validation->run() === FALSE){
            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "forget_password";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }else{
            $user = $this->users_model->get_row(
                array(
                    "isActive" => 1,
                    "email" => $this->input->post("email")
                )
            );

            if($user){

                $this->load->model("emailsettings_model");

                $this->load->helper("string");

                $temp_password = random_string();

                $send = send_mail($user->email,"Forget Password","Your temporary password is <b>{$temp_password}</b>");

                if($send){
                    echo "Email has been sent.";

                    $this->users_model->update_db(
                      array(
                          "id" => $user->id
                      ),
                      array(
                          "password" => md5($temp_password)
                      )
                    );

                    $alert = array(
                        "title" => "Password changed",
                        "text" => "Email has been sent.",
                        "type" => "success"
                    );
                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("login"));

                    die();

                }else{
                    //echo $this->email->print_debugger();

                    $alert = array(
                        "title" => "Error",
                        "text" => "Email couldn't send.",
                        "type" => "error"
                    );
                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("forget_password"));
                }

            }else{
                $alert = array(
                    "title" => "Error",
                    "text" => "User couldn't found.",
                    "type" => "error"
                );
                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("forget_password"));
            }
        }

       // $this->input->post("email");
    }


}