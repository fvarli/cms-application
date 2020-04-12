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