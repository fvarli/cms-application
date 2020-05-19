<?php

class Galleries extends MY_Controller{

    // TODO check 271 - 272 - 273 - 274 video
    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "galleries_view";
        $this->load->model("gallery_model");
        $this->load->model("file_model");
        $this->load->model("image_model");
        $this->load->model("file_model");

        if(!get_active_user()){
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $viewData = new stdClass();

        //get all data
        $items = $this->gallery_model->get_all(
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

    public function add_new_gallery()
    {

        $viewData =new stdClass();

        //steps for data will be added
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    // TODO Create folder doesnt work - Lecture 82
    public function save_new_gallery()
    {
        $this->load->library("form_validation");

        // Kurallar yazilir..
        $this->form_validation->set_rules("title", "Gallery Name", "required|trim");

        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> should be filled out."
            )
        );

        $validate = $this->form_validation->run();

        if($validate){

            $gallery_type = $this->input->post("gallery_type");
            $path         = "uploads/$this->viewFolder/";
            $folder_name = "";

            if($gallery_type == "image"){

                $folder_name = convertToSEO($this->input->post("title"));
                $path = "$path/images/$folder_name";

            } else if($gallery_type == "file"){

                $folder_name = convertToSEO($this->input->post("title"));
                $path = "$path/files/$folder_name";
            }


            if($gallery_type != "video"){

                if(!mkdir($path, 0755)){

                    $alert = array(
                        "title" => "İşlem Başarısız",
                        "text" => "Galeri Üretilirken problem oluştu. (Yetki Hatası)",
                        "type"  => "error"
                    );

                    // İşlemin Sonucunu Session'a yazma işlemi...
                    $this->session->set_flashdata("alert", $alert);

                    redirect(base_url("galleries"));
                    die();
                }

            }

            $insert = $this->gallery_model->add_db(
                array(
                    "title"         => $this->input->post("title"),
                    "gallery_type"  => $this->input->post("gallery_type"),
                    "url"           => convertToSEO($this->input->post("title")),
                    "folder_name"   => $folder_name,
                    "rank"          => 0,
                    "isActive"      => 1,
                    "createdAt"     => date("Y-m-d H:i:s")
                )
            );

            // TODO Alert sistemi eklenecek...
            if($insert){

                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Kayıt başarılı bir şekilde eklendi",
                    "type"  => "success"
                );

            } else {

                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Kayıt Ekleme sırasında bir problem oluştu",
                    "type"  => "error"
                );
            }

            // İşlemin Sonucunu Session'a yazma işlemi...
            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("galleries"));

        } else {

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    public function update_existing_gallery($id)
    {
        $viewData =new stdClass();

        $item = $this->gallery_model->get_row(
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

    // TODO Edit folder doesnt work - Lecture 83
    public function update_gallery($id, $gallery_type, $oldFolderName="")
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

           $this->form_validation->set_rules("gallery_name","Gallery Name","required|trim");

            $this->form_validation->set_message(
                array(
                    "required" => "<b>{field}</b> should be filled out."
                )
            );

            //True - False
            $validate = $this->form_validation->run();

            if($validate){
                $update = $this->gallery_model->update_db(
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
                redirect(base_url("galleries"));
            }
            else{
                $viewData = new stdClass();

                $item = $this->gallery_model->get_row(
                    array(
                        "id" => $id,
                    )
                );

                //steps for data will be sent to view
                $viewData->viewFolder = $this->viewFolder;
                $viewData->subViewFolder = "update";
                $viewData->form_error = true;
               // $viewData->$item = $item;

                $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
            }
    }

    // TODO Delete folder doesnt work - Lecture 84
    public function delete_record($id){

        $delete = $this->gallery_model->delete_record(
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
        redirect(base_url("galleries"));

    }

    public function isActiveSetter($id)
    {
        if($id){
            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->gallery_model->update_db(
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
            $this->gallery_model->update_db(
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

        $viewData->item = $this->gallery_model->get_row(
          array(
              "id" => $id
          )
        );

        $viewData->item_images = $this->image_model->get_all(
            array(
                "id" => $id
            ),
            "rank ASC"
        );

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function upload_image_old($id)
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

    public function upload_image($gallery_id, $gallery_type, $folderName)
    {
        $file_name =  convertToSEO(pathinfo($_FILES["file"]["name"],PATHINFO_FILENAME)) . "." . pathinfo($_FILES["file"]["name"],PATHINFO_EXTENSION);

        if($gallery_type == "image"){

            $image_252x156 = upload_picture_to_size($_FILES["file"]["tmp_name"],"uploads/$this->viewFolder/images/$folderName/", 252,156, $file_name);
            $image_350x216 = upload_picture_to_size($_FILES["file"]["tmp_name"],"uploads/$this->viewFolder/images/$folderName/", 350,216, $file_name);
            $image_851x606 = upload_picture_to_size($_FILES["file"]["tmp_name"],"uploads/$this->viewFolder/images/$folderName/", 851,606, $file_name);

            if($image_252x156 && $image_350x216 && $image_851x606){
                $this->image_model->add_db(
                    array(
                        "img_url" => $file_name,
                        "rank" => 0,
                        "isActive" => 1,
                        "createdAt" => date("Y-m-d H:i:s"),
                        "gallery_id" => $gallery_id
                    )
                );
            }else{
                echo $this->upload->display_errors();
            }

        }else{
            $config ["upload_path"] = "uploads/$this->viewFolder/files/$folderName";
            $config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx|txt';
            $config['max_size'] = '10000';
            $config["file_name"] = $file_name;
            //	$config['max_width'] = '1024';
            //	$config['max_height'] = '768';

            $this->load->library("upload",$config);

            $upload = $this->upload->do_upload("file");

            if($upload){

                $uploaded_file = $this->upload->data("file_name");


                $this->file_model->add_db(
                    array(
                        "img_url" => $uploaded_file,
                        "rank" => 0,
                        "isActive" => 1,
                        "createdAt" => date("Y-m-d H:i:s"),
                        "gallery_id" => $gallery_id
                    )
                );
            }else{
                echo $this->upload->display_errors();
            }

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

    // TODO delete doesn't work - lecture 45
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
