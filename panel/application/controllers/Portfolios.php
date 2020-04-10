<?php

class Portfolios extends CI_Controller{

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

    public function delete_portfolio($id){

        $delete = $this->portfolios_model->deleteportfolio(
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
