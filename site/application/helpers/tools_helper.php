<?php

function get_product_cover_image($product_id){
    $t = &get_instance();

    $t->load->model("products_image_model");

    $cover_image = $t->products_image_model->get_row(
        array(
            "isCover" => 1,
            "product_id" => $product_id
        )
    );

    if(empty($cover_image)){
        $cover_image = $t->products_image_model->get_row(
            array(
                "product_id" => $product_id
            )
        );
    }

    return !empty($cover_image) ? $cover_image->img_url: "";
}

function getReadableDate($date){

    return strftime('%d/%m/%Y', strtotime($date));

}

function get_portfolio_category_title($id){

    $t = &get_instance();

    $t->load->model("portfolio_categories_model");

    $portfolio = $t->portfolio_categories_model->get_row(
        array(
            "id" => $id
        )
    );

    return (empty($portfolio)) ? false : $portfolio->title;
}


function get_portfolio_cover_image($id){
    $t = &get_instance();

    $t->load->model("portfolios_image_model");

    $cover_image = $t->portfolios_image_model->get_row(
        array(
            "isCover" => 1,
            "portfolio_id" => $id
        )
    );

    if(empty($cover_image)){
        $cover_image = $t->portfolios_image_model->get_row(
            array(
                "portfolio_id" => $id
            )
        );
    }

    return !empty($cover_image) ? $cover_image->img_url: "";
}

function get_settings(){

    $t = &get_instance();

    $settings = $t->session->userdata("settings");

    if(empty($settings)){

        $t->load->model("settings_model");

        $settings = $t->settings_model->get_row();

        $t->session->set_userdata("settings", $settings);

    }

    return $settings;

}

function send_mail($toEmail = "", $subject = "", $message = ""){
    $t = &get_instance();

    $t->load->model("emailsettings_model");

    $email_settings = $t->emailsettings_model->get_row(
        array(
            "isActive" => 1
        )
    );

     if (empty($toEmail))
         $toEmail = $email_settings->to;

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
