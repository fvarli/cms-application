<?php

class Products extends MY_Controller{

    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "products_view";
        $this->load->model("product_model");
        $this->load->model("product_image_model");

        if(!get_active_user()){
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $viewData = new stdClass();

        //get all data
        $items = $this->product_model->get_all(
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

    public function add_new_product()
    {

        $viewData =new stdClass();

        //steps for data will be added
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    public function save_new_product()
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
           $this->load->library("Form_validation");

        /*
         * write rules
         * run form validation
         * record is saved, if it works
         * otherwise record isn't saved
        */

         $this->form_validation->set_rules("title","Title","required|trim");

        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> should be filled out."
            )
        );

        //True - False
        $validate = $this->form_validation->run();

        if($validate){
            $insert = $this->product_model->add_db(
                array(
                    "url" => $this->input->post("url"),
                    "title" => $this->input->post("title"),
                    "description" => $this->input->post("description"),
                    "rank" => 0,
                    "isActive" => 1,
                    "createdAt" => date("Y-m-d H:i:s")
                )
            );

            if($insert){
                $alert = array(
                    "text" => "Record has been added!",
                    "type" => "success"
                );
            }else{
                $alert = array(
                    "text" => "Record couldn't added!",
                    "type" => "error"
                );
            }
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("products"));
        }
        else{
            $viewData = new stdClass();
            //steps for data will be sent to view
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    public function update_existing_product($id)
    {
        $viewData =new stdClass();

        $item = $this->product_model->get_row(
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

    public function update_product($id)
    {
   /*     $url = $this->input->post("url");
        $title = $this->input->post("title");
        $description = $this->input->post("description");

        $data = array(
            "url" => $url,
            "title" => $title,
            "description" => $description
        );

        $update = $this
            ->db
            ->where("id",$id)
            ->update("products",$data);
        if($update){
            redirect(base_url("Products/index"));
        }else{
            echo "Error";
        }
*/
            $this->load->library("Form_validation");

            /*
             * write rules
             * run form validation
             * record is saved, if it works
             * otherwise record isn't saved
            */

           $this->form_validation->set_rules("title","Title","required|trim");

            $this->form_validation->set_message(
                array(
                    "required" => "<b>{field}</b> should be filled out."
                )
            );

            //True - False
            $validate = $this->form_validation->run();

            if($validate){
                $update = $this->product_model->update_db(
                    array(
                        "id" => $id,
                    ),
                    array(
                        "url" => $this->input->post("url"),
                        "title" => $this->input->post("title"),
                        "description" => $this->input->post("description")
                    )
                );

                if($update){
                    $alert = array(
                        "text" => "Record has been updated!",
                        "type" => "success"
                    );
                }else{

                    $alert = array(
                        "text" => "Record couldn't update!",
                        "type" => "error"
                    );
                }
                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("products"));
            }
            else{
                $viewData = new stdClass();

                $item = $this->product_model->get_row(
                    array(
                        "id" => $id,
                    )
                );

                //steps for data will be sent to view
                $viewData->viewFolder = $this->viewFolder;
                $viewData->subViewFolder = "update";
                $viewData->form_error = true;
                $viewData->item = $item;

                $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
            }
    }

    public function delete_record($id){

        $delete = $this->product_model->delete_record(
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
        redirect(base_url("products"));

    }

    public function isActiveSetter($id)
    {
        if(!is_allowed_update_module()){
            die();
        }

        if($id){
            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->product_model->update_db(
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
        if(!is_allowed_update_module()){
            die();
        }

        $data = $this->input->post("data");

        parse_str($data, $order);

        $items = $order["ord"];

        foreach ($items as $rank => $id){
            $this->product_model->update_db(
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

        $viewData->item = $this->product_model->get_row(
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

    public function upload_image($id)
    {
        //TODO make resize image lecture 240
        $file_name =  convertToSEO(pathinfo($_FILES["file"]["name"],PATHINFO_FILENAME)) . "." . pathinfo($_FILES["file"]["name"],PATHINFO_EXTENSION);

        $image_348x315 = upload_picture_to_size($_FILES["file"]["tmp_name"],"uploads/$this->viewFolder/", 348,315, $file_name);
        $image_1080x426 = upload_picture_to_size($_FILES["file"]["tmp_name"],"uploads/$this->viewFolder/", 1080,426, $file_name);


        if($image_348x315 && $image_1080x426){

            $this->product_image_model->add_db(
                array(
                    "product_id" => $id,
                    "img_url" => $file_name,
                    "rank" => 0,
                    "isActive" => 1,
                    "isCover" => 0,
                    "createdAt" => date("Y-m-d H:i:s"),
                )
            );
        }else{
            echo $this->upload->display_errors();
        }
    }

    public function refresh_image_list($id)
    {

        $viewData = new stdClass();

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "images";

        $viewData->item_images = $this->product_image_model->get_all(
            array(
                "product_id" => $id
            )
        );

       $render_html = $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/render_elements/image_list_view", $viewData, true);

       echo $render_html;
    }

    public function isCoverSetter($id, $parent_id)
    {
        if($id && $parent_id){
            $isCover = ($this->input->post("data") === "true") ? 1 : 0;

            //select as cover image
            $this->product_image_model->update_db(
                array(
                    "id" => $id,
                    "product_id" => $parent_id
                ),
                array(
                    "isCover" => $isCover
                )
            );
            //unselected as cover image
            $this->product_image_model->update_db(
                array(
                    "id !=" => $id,
                    "product_id" => $parent_id
                ),
                array(
                    "isCover" => 0
                )
            );
        }

        $viewData = new stdClass();

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "images";

        $viewData->item_images = $this->product_image_model->get_all(
            array(
                "product_id" => $parent_id
            ), "rank ASC"
        );

        $render_html = $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/render_elements/image_list_view", $viewData, true);

        echo $render_html;
    }

    public function imageIsActiveSetter($id)
    {
        if(!is_allowed_update_module()){
            die();
        }

        if($id){
            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->product_image_model->update_db(
                array(
                    "id" => $id
                ),
                array(
                    "isActive" => $isActive
                )
            );
        }
    }

    public function imageRankSetter()
    {
        if(!is_allowed_update_module()){
            die();
        }

        $data = $this->input->post("data");

        parse_str($data, $order);

        $items = $order["ord"];

        foreach ($items as $rank => $id){
            $this->product_image_model->update_db(
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

    public function delete_image($id, $parent_id){

        $fileName = $this->product_image_model->get_row(
        array(
            "id" => $id
        )
        );

        // TODO update alert
        $delete = $this->product_image_model->deleteImage(
            array(
                "id" => $id
            )
        );

        if($delete){
            $alert = array(
                "text" => "Image has been deleted!",
                "type" => "success"
            );
            unlink("uploads/$this->viewFolder/$fileName->img_url");
            redirect(base_url("products/update_existing_image/$parent_id"));
        }else{
            $alert = array(
                "text" => "Record couldn't delete!",
                "type" => "error"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("products/update_existing_image/$parent_id"));
        }

    }
}
