<?php

class Courses extends CI_Controller{

    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "courses_view";
        $this->load->model("courses_model");

        if(!get_active_user()){
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $viewData = new stdClass();

        //get all data
        $items = $this->courses_model->get_all(
            array(
            ),
            "rank ASC"
            );
        /*print_r($items); die();*/

        //steps for data will be sent to view
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

       // print_r($items); die();
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function add_new_course()
    {

        $viewData =new stdClass();

        //steps for data will be added
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    // TODO update save section Lecture 55
    public function save_new_course()
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

        if($_FILES["img_url"]["name"] == ""){

            $alert = array(
                "title" => "Error",
                "text" => "Please choose an image",
                "type"  => "error"
            );

            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("courses/add_new_course"));

            die();
        }

        $this->form_validation->set_rules("title", "Title", "required|trim");
        $this->form_validation->set_rules("event_date", "Course Date", "required|trim");

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> should be filled."
            )
        );

        $validate = $this->form_validation->run();

        if($validate){


            $file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);


            $image_255x157 = upload_picture_to_size($_FILES["img_url"]["tmp_name"],"uploads/$this->viewFolder/", 255,157, $file_name);
            $image_1140x705 = upload_picture_to_size($_FILES["img_url"]["tmp_name"],"uploads/$this->viewFolder/", 1140,705, $file_name);


            if($image_255x157 && $image_1140x705){

                $insert = $this->courses_model->add_db(
                    array(
                        "title"         => $this->input->post("title"),
                        "description"   => $this->input->post("description"),
                        "url"           =>  $this->input->post("url"),
                        "event_date"    =>  $this->input->post("event_date"),
                        "img_url"       => $file_name,
                        "rank"          => 0,
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

            } else {

                $alert = array(
                    "title" => "Error",
                    "text" => "It didn't work.",
                    "type"  => "error"
                );

                $this->session->set_flashdata("alert", $alert);

                redirect(base_url("courses/add_new_course"));

                die();

            }

            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("courses"));

        } else {

            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }

    public function update_existing_course($id)
    {
        $viewData =new stdClass();

        $item = $this->courses_model->get_row(
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
    public function update_course($id)
    {
        $this->load->library("form_validation");


        $this->form_validation->set_rules("title", "Title", "required|trim");
        $this->form_validation->set_rules("event_date", "Course Date", "required|trim");

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> should be filled."
            )
        );

        $validate = $this->form_validation->run();

        if($validate){

            // Upload Süreci...
            if($_FILES["img_url"]["name"] !== "") {

                $file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);

                //TODO show edit - update page - lecture 243
                $image_255x157 = upload_picture_to_size($_FILES["img_url"]["tmp_name"],"uploads/$this->viewFolder/", 255,157, $file_name);
                $image_1140x705 = upload_picture_to_size($_FILES["img_url"]["tmp_name"],"uploads/$this->viewFolder/", 1140,705, $file_name);

                if($image_255x157 && $image_1140x705){

                    $data = array(
                        "title" => $this->input->post("title"),
                        "description" => $this->input->post("description"),
                        "event_date" => $this->input->post("event_date"),
                        "url" => convertToSEO($this->input->post("title")),
                        "img_url" => $file_name,
                    );

                } else {

                    $alert = array(
                        "title" => "Error",
                        "text" => "It didn't work.",
                        "type"  => "error"
                    );

                    $this->session->set_flashdata("alert", $alert);

                    redirect(base_url("courses/update_existing_course/$id"));

                    die();

                }

            } else {

                $data = array(
                    "title" => $this->input->post("title"),
                    "description" => $this->input->post("description"),
                    "event_date" => $this->input->post("event_date"),
                    "url" => $this->input->post("url")
                );
            }

            $update = $this->courses_model->update_db(array("id" => $id), $data);

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

            redirect(base_url("courses"));

        } else {

            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;

            $viewData->item = $this->courses_model->get_row(
                array(
                    "id"    => $id,
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    public function delete_course($id){

        $delete = $this->courses_model->deleteNews(
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
        redirect(base_url("courses"));

    }

    public function isActiveSetter($id)
    {
        if($id){
            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->courses_model->update_db(
                array(
                    "id" => $id
                ),
                array(
                    "isActive" => $isActive
                )
            );
        }
    }

    public function rankSetter()
    {
        $data = $this->input->post("data");

        parse_str($data, $order);

        $items = $order["ord"];

        foreach ($items as $rank => $id){
            $this->courses_model->update_db(
                array(
                    "id" => $id,
                    "rank !=" => $rank
                ),
                array(
                    "rank" => $rank
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

        $viewData->item = $this->courses_model->get_row(
          array(
              "id" => $id
          )
        );

        $viewData->item_images = $this->product_image_model->get_all(
            array(
                "product_id" => $id
            ),
            "rank ASC"
        );

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

}
