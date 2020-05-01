<?php

    function convertToSEO($text){
        $turkish = array("ç","Ç","ğ","Ğ","ü","Ü","ö","Ö","ı","İ","ş","Ş",".",",","!","'",";","\""," ","?","*","_","|","<",">","=","(",")","[","]","{","}","~");
        $convert = array("c","c","g","g","u","u","o","o","i","i","s","s","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-");

        $seo = strtolower(str_replace($turkish,$convert,$text));
    }

    function getReadableDate($date){

        return strftime('%d/%m/%Y', strtotime($date));

    }

    function get_active_user(){
        $getActiveUSer = &get_instance();

        $user = $getActiveUSer->session->userdata("user");

        if ($user)
            return $user;
        else
            return false;
    }

    function send_mail($toEmail = "", $subject = "", $message = ""){
        $t = &get_instance();

        $t->load->model("emailsettings_model");

        $email_settings = $t->emailsettings_model->get_row(
            array(
                "isActive" => 1
            )
        );

        $config = array(
            "protocol" => $email_settings->protocol,
            "smtp_host" => $email_settings->host,
            "smtp_port" => $email_settings->port,
            "smtp_user" => $email_settings->user,
            "smtp_pass" => $email_settings->password,
            "starttls" => true,
            "charset" => "utf-8",
            "mailtype" => "html",
            "wordwrap" => true,
            "newline" => "\r\n"
        );

        $t->load->library("email", $config);

        $t->email->from($email_settings->from, $email_settings->user_name);
        $t->email->to($toEmail);
        $t->email->subject($subject);
        $t->email->message($message);

        return $t->email->send();
    }

    function get_settings(){
        $t = &get_instance();

        $t->load->model("settings_model");

        if($t->session->userdata("settings")){
            $settings = $t->session->userdata("settings");
        } else {

            $settings = $t->settings_model->get_row();

            if(!$settings) {

                $settings = new stdClass();
                $settings->company_name = "ferzobot";
                $settings->logo         = "default";

            }

            $t->session->set_userdata("settings", $settings);

        }

        return $settings;
    }

    function get_category_title($category_id = 0){
        $t = &get_instance();

        $t->load->model("portfolio_categories_model");

        $category = $t->portfolio_categories_model->get_row(
          array(
              "id" => $category_id
          )
        );

        if($category)
            return $category->title;
        else
            return "<b style='color: red'>Undefined</b>";
    }

    function upload_picture_to_size($file, $upload_path, $width, $height, $name){
        $t = &get_instance();

        $t->load->library("simpleimagelib");

        if(!is_dir("{$upload_path}/{$width}x{$height}")){
            mkdir("{$upload_path}/{$width}x{$height}");
        }

        $upload_error = false;
        try {
            // Create a new SimpleImage object
            $simple_image = $t->simpleimagelib->get_simple_image_instance();

            $simple_image
                ->fromFile($file)                               // load image.jpg
                ->thumbnail($width, $height,'center')           // thumbnail to 320x200 pixels
                ->toFile("{$upload_path}/{$width}x{$height}/$name", 'image/png');  // convert to PNG and save a copy to new-image.png
                //->autoOrient()                                // adjust orientation based on exif data
                //->flip('x')                                   // flip horizontally
                //->colorize('DarkBlue')                        // tint dark blue
                //->border('black', 10)                         // add a 10 pixel black border
                //->overlay('watermark.png', 'bottom right')    // add a watermark image
                //->toScreen();                                     // output to the screen

        } catch(Exception $err) {
            // Handle errors
            $error = $err->getMessage();
            $upload_error =true;
        }

        if($upload_error){
            echo $error;
        }else{
            return true;
        }
    }

    function get_picture_to_size($path ="", $picture="", $resolution = "50x50"){

    if($picture !=""){
        if(file_exists(FCPATH . "uploads/$path/$resolution/$picture")){
            $picture = "uploads/$path/$resolution/$picture";
        }else{
            $picture = base_url("assets/assets/images/default.jpg");
        }
    }else{
        $picture = base_url("assets/assets/images/default.jpg");
    }
    return $picture;
}

    function get_page_list($page){

        $page_list = array(
            "homepage" => "Home",
            "about_us" => "About Us Page",
            "news" => "News Page",
            "galleries" => "Galleries Page",
            "portfolios" => "Portfolios Page",
            "references" => "References Page",
            "services" => "Services Page",
            "courses" => "Courses Page",
            "brands" => "Brands Page",
            "contact" => "Contact Page"
        );

        return (empty($page)) ? $page_list : $page_list[$page];
    }

