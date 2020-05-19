<?php

class Portfolios extends MY_Controller{

    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "portfolios_view";
        $this->load->model("portfolios_model");
        $this->load->model("portfolio_categories_model");
        $this->load->model("portfolios_image_model");

        if(!get_active_user()){
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $viewData = new stdClass();

        //get all data
        $items = $this->portfolios_model->get_all(
            array(
            ),
            "rank ASC"
            );
        //print_r($items); die();

        //steps for data will be sent to view
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

       // print_r($items); die();
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function add_new_portfolio()
    {

        $viewData =new stdClass();

        $viewData->categories = $this->portfolio_categories_model->get_all(
            array (
                "isActive" => 1
            )
        );
        //steps for data will be added
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    public function save_new_portfolio()
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
            ->insert("portfolios",$data);

        if($insert){
            redirect(base_url("portfolios/index"));
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
         $this->form_validation->set_rules("category_id","Category","required|trim");
         $this->form_validation->set_rules("client","Client","required|trim");
         $this->form_validation->set_rules("finishedAt","Finish Date","required|trim");

        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> should be filled out."
            )
        );

        //True - False
        $validate = $this->form_validation->run();

        if($validate){
            $insert = $this->portfolios_model->add_db(
                array(
                    "url" => $this->input->post("url"),
                    "title" => $this->input->post("title"),
                    "description" => $this->input->post("description"),
                    "client" => $this->input->post("client"),
                    "finishedAt" => $this->input->post("finishedAt"),
                    "category_id" => $this->input->post("category_id"),
                    "place" => $this->input->post("place"),
                    "portfolio_url" => $this->input->post("portfolio_url"),
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
            redirect(base_url("portfolios"));
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

    public function update_existing_portfolio($id)
    {
        $viewData =new stdClass();

        $item = $this->portfolios_model->get_row(
            array(
                "id" => $id
            )
        );

        $viewData->categories = $this->portfolio_categories_model->get_all(
            array (
                "isActive" => 1
            )
        );

        //steps for data will be added
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update_portfolio($id)
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
            ->update("portfolios",$data);
        if($update){
            redirect(base_url("portfolios/index"));
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
            $this->form_validation->set_rules("category_id","Category","required|trim");
            $this->form_validation->set_rules("client","Client","required|trim");
            $this->form_validation->set_rules("finishedAt","Finish Date","required|trim");

            $this->form_validation->set_message(
                array(
                    "required" => "<b>{field}</b> should be filled out."
                )
            );

            //True - False
            $validate = $this->form_validation->run();

            if($validate){
                $update = $this->portfolios_model->update_db(
                    array(
                        "id" => $id,
                    ),
                    array(
                        "url" => $this->input->post("url"),
                        "title" => $this->input->post("title"),
                        "description" => $this->input->post("description"),
                        "client" => $this->input->post("client"),
                        "finishedAt" => $this->input->post("finishedAt"),
                        "category_id" => $this->input->post("category_id"),
                        "place" => $this->input->post("place"),
                        "portfolio_url" => $this->input->post("portfolio_url"),
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
                redirect(base_url("portfolios"));
            }
            else{
                $viewData = new stdClass();

                $item = $this->portfolios_model->get_row(
                    array(
                        "id" => $id,
                    )
                );

                //steps for data will be sent to view
                $viewData->viewFolder = $this->viewFolder;
                $viewData->subViewFolder = "update";
                $viewData->form_error = true;
                $viewData->item = $item;
                $viewData->categories = $this->portfolio_categories_model->get_all(
                    array (
                        "isActive" => 1
                    )
                );

                $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
            }
    }

    public function delete_record($id){

        $delete = $this->portfolios_model->delete_record(
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
        redirect(base_url("portfolios"));

    }

    public function isActiveSetter($id)
    {
        if(!is_allowed_update_module()){
            die();
        }

        if($id){
            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->portfolios_model->update_db(
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
            $this->portfolios_model->update_db(
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

        $viewData->item = $this->portfolios_model->get_row(
          array(
              "id" => $id
          )
        );

        $viewData->item_images = $this->portfolios_image_model->get_all(
            array(
                "portfolio_id" => $id
            ),
            "rank ASC"
        );

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function upload_image ($id)
    {
        $file_name =  convertToSEO(pathinfo($_FILES["file"]["name"],PATHINFO_FILENAME)) . "." . pathinfo($_FILES["file"]["name"],PATHINFO_EXTENSION);

        //TODO path image issue - lecture 241
        $image_255x157 = upload_picture_to_size($_FILES["file"]["tmp_name"],"uploads/$this->viewFolder/", 255,157, $file_name);
        $image_276x171 = upload_picture_to_size($_FILES["file"]["tmp_name"],"uploads/$this->viewFolder/", 276,171, $file_name);
        $image_352x171 = upload_picture_to_size($_FILES["file"]["tmp_name"],"uploads/$this->viewFolder/", 352,171, $file_name);
        $image_1080x426 = upload_picture_to_size($_FILES["file"]["tmp_name"],"uploads/$this->viewFolder/", 1080,426, $file_name);

        if($image_255x157 && $image_276x171 && $image_352x171 && $image_1080x426){


            $this->portfolios_image_model->add_db(
                array(
                    "portfolio_id" => $id,
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

        $viewData->item_images = $this->portfolios_image_model->get_all(
            array(
                "portfolio_id" => $id
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
            $this->portfolios_image_model->update_db(
                array(
                    "id" => $id,
                    "portfolio_id" => $parent_id
                ),
                array(
                    "isCover" => $isCover
                )
            );
            //unselected as cover image
            $this->portfolios_image_model->update_db(
                array(
                    "id !=" => $id,
                    "portfolio_id" => $parent_id
                ),
                array(
                    "isCover" => 0
                )
            );
        }

        $viewData = new stdClass();

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "images";

        $viewData->item_images = $this->portfolios_image_model->get_all(
            array(
                "portfolio_id" => $parent_id
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

            $this->portfolios_image_model->update_db(
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
            $this->portfolios_image_model->update_db(
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

        $fileName = $this->portfolios_image_model->get_row(
        array(
            "id" => $id
        )
        );

        $delete = $this->portfolios_image_model->deleteImage(
            array(
                "id" => $id
            )
        );

        if($delete){
            unlink("uploads/$this->viewFolder/$fileName->img_url");
            redirect(base_url("portfolios/update_existing_image/$parent_id"));
        }else{
            redirect(base_url("portfolios/update_existing_image/$parent_id"));
        }

    }
}
