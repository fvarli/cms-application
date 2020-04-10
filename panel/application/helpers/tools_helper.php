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