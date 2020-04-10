<?php

class Products extends CI_Controller{

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

    public function delete_product($id){

        $delete = $this->product_model->deleteProduct(
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

    public function upload_image ($id)
    {
        $file_name =  convertToSEO(pathinfo($_FILES["file"]["name"],PATHINFO_FILENAME)) . "." . pathinfo($_FILES["file"]["name"],PATHINFO_EXTENSION);

        $config ["upload_path"] = "uploads/$this->viewFolder";
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000';
        $config["file_name"] = $file_name;
        //	$config['max_width'] = '1024';
        //	$config['max_height'] = '768';



        $this->load->library("upload",$config);

        if(!$this->upload->do_upload("file")){

            echo $this->upload->display_errors();

        }else{

            // TODO update img_url name section Lecture 37
           $uploaded_file = $this->upload->data("file_name");

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

        $delete = $this->product_image_model->deleteImage(
            array(
                "id" => $id
            )
        );

        if($delete){
            unlink("uploads/$this->viewFolder/$fileName->img_url");
            redirect(base_url("products/update_existing_image/$parent_id"));
        }else{
            redirect(base_url("products/update_existing_image/$parent_id"));
        }

    }
}
