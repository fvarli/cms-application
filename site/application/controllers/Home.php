<?php

class Home extends CI_Controller{

    public $view_folder = "";
    public function __construct()
    {
        parent::__construct();
        $this->view_folder = "homepage";

        $this->load->helper("tools");
        $this->load->helper("text");
        
    }

    public function index()
    {
        $view_data = new stdClass();

        $view_data->view_folder = "home_view";

        $this->load->view($view_data->view_folder, $view_data);
    }

    public function product_list()
    {
        $view_data = new stdClass();

        $this->load->model("products_model");

        $view_data->products = $this->products_model->get_all(
          array(
              "isActive" => 1
          ), "rank ASC"
        );

        //echo get_product_cover_image(56);die();
        //print_r($view_data->products); die();

        $view_data->view_folder = "product_list_view";

        $this->load->view($view_data->view_folder, $view_data);
    }

    public function product_detail($url = "")
    {
        $view_data = new stdClass();

        $this->load->model("products_model");
        $this->load->model("products_image_model");
        $view_data->view_folder = "product_view";


        $view_data->product = $this->products_model->get_row(
            array(
                "isActive" => 1,
                "url" => $url
            )
        );

        $view_data->product_images = $this->products_image_model->get_all(
            array(
                "isActive" => 1,
                "product_id" => $view_data->product->id
            ), "rank ASC"
        );
        //print_r($view_data->product_images); die();

        $view_data->other_products = $this->products_model->get_all(
          array(
              "isActive" => 1,
              "id !=" => $view_data->product->id
          ), "rand()", array("start" => 0, "count" =>3)
        );

        //echo get_product_cover_image(46);die();
        //print_r($view_data->products); die();

        $this->load->view($view_data->view_folder, $view_data);
    }

    public function portfolio_list()
    {
        $view_data = new stdClass();

        $this->load->model("portfolios_model");

        $view_data->portfolios = $this->portfolios_model->get_all(
            array(
                "isActive" => 1
            ), "rank ASC"
        );

        //echo get_product_cover_image(56);die();
        //print_r($view_data->portfolios); die();

        $view_data->view_folder = "portfolio_list_view";

        $this->load->view($view_data->view_folder, $view_data);
    }

    public function portfolio_detail($portfolio_url = "")
    {

        $view_data = new stdClass();

        $this->load->model("portfolios_model");
        $this->load->model("portfolios_image_model");
        $view_data->view_folder = "portfolio_view";

        $view_data->portfolio = $this->portfolios_model->get_row(
            array(
                "isActive" => 1,
                "portfolio_url" => $portfolio_url
            )
        );
        //print_r($view_data->portfolio);die();

        $view_data->portfolio_images = $this->portfolios_image_model->get_all(
            array(
                "isActive" => 1,
                "portfolio_id" => $view_data->portfolio->id
            ), "rank ASC"
        );
        //print_r($view_data->portfolio_images); die();

        $view_data->other_portfolios= $this->portfolios_model->get_all(
            array(
                "isActive" => 1,
                "id !=" => $view_data->portfolio->id
            ), "rand()", array("start" => 0, "count" =>3)
        );

        //echo get_product_cover_image(46);die();
        //print_r($view_data->other_portfolio); die();

        $this->load->view($view_data->view_folder, $view_data);
    }

    public function course_list()
    {
        $view_data = new stdClass();

        $this->load->model("courses_model");

        $view_data->courses = $this->courses_model->get_all(
            array(
                "isActive" => 1
            ), "event_date ASC"
        );

        //echo get_product_cover_image(56);die();
        //print_r($view_data->courses); die();

        $view_data->view_folder = "course_list_view";

        $this->load->view($view_data->view_folder, $view_data);
    }

    public function course_detail($url = "")
    {
        // echo $url; die();

        $view_data = new stdClass();

        $this->load->model("courses_model");
        $view_data->view_folder = "course_view";

        $view_data->course = $this->courses_model->get_row(
            array(
                "isActive" => 1,
                "url" => $url
            )
        );
        //print_r($view_data->course);die();


        $view_data->other_courses = $this->courses_model->get_all(
            array(
                "isActive" => 1,
                "id !=" => $view_data->course->id
            ), "rand()", array("start" => 0, "count" =>3)
        );

        //print_r($view_data->other_courses); die();

        $this->load->view($view_data->view_folder, $view_data);
    }

    public function reference_list()
    {
        $view_data = new stdClass();

        $this->load->model("references_model");

        $view_data->references = $this->references_model->get_all(
            array(
                "isActive" => 1
            )
        );

        //print_r($view_data->references); die();

        $view_data->view_folder = "reference_list_view";

        $this->load->view($view_data->view_folder, $view_data);
    }

    public function brand_list()
    {
        $view_data = new stdClass();

        $this->load->model("brands_model");

        $view_data->brands = $this->brands_model->get_all(
            array(
                "isActive" => 1
            ),
        );

        //print_r($view_data->brands); die();

        $view_data->view_folder = "brand_list_view";

        $this->load->view($view_data->view_folder, $view_data);
    }

    public function service_list()
    {
        $view_data = new stdClass();

        $this->load->model("services_model");

        $view_data->services = $this->services_model->get_all(
            array(
                "isActive" => 1
            ),
            );

        //print_r($view_data->services); die();

        $view_data->view_folder = "service_list_view";

        $this->load->view($view_data->view_folder, $view_data);
    }

    public function about_us()
    {
        $view_data = new stdClass();

        $this->load->model("settings_model");

        $view_data->settings = $this->settings_model->get_row();

        //print_r($view_data->settings); die();

        $view_data->view_folder = "about_us_view";

        $this->load->view($view_data->view_folder, $view_data);
    }

    public function contact()
    {
        $view_data = new stdClass();

        $view_data->view_folder = "contact_view";

        $this->load->helper("captcha");

        $config = array(
            "word"          => '',
            "img_path"      => 'captcha/',
            "img_url"       =>base_url("captcha"),
            "font_path"     => 'C:\xampp\htdocs\cms-application\site\fonts\corbel.ttf',
            "img_width"     => 150,
            "img_height"    => 50,
            "expiration"    => 7200,
            "word_length"   => 5,
            "font_size"     => 20,
            "img_id"        => 'captcha_img',
            "pool"          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
            "colors"        => array(
                'background' => array(56,255,45),
                'border'     => array(255,255,255),
                'text'       => array(0,0,0),
                'grid'       => array(255,40,40)
            )
        );

        $view_data->captcha = create_captcha($config);

        //print_r($captcha); die();

        $this->session->set_userdata("captcha", $view_data->captcha["word"]);

        $this->load->view($view_data->view_folder, $view_data);
    }

    public function send_contact_message()
    {
        $this->load->library("form_validation");

        $this->form_validation->set_rules("name", "name", "trim|required");
        $this->form_validation->set_rules("email", "email", "trim|required|valid_email");
        $this->form_validation->set_rules("subject", "subject", "trim|required");
        $this->form_validation->set_rules("message", "message", "trim|required");
        $this->form_validation->set_rules("captcha", "captcha", "trim|required");

        if($this->form_validation->run() === FALSE){
            //TODO add alert
            redirect(base_url("contact"));
        }else{
            if($this->session->userdata("captcha") == $this->input->post("captcha")){

                $name = $this->input->post("name");
                $email = $this->input->post("email");
                $subject = $this->input->post("subject");
                $message = $this->input->post("message");

                $email_message = "A new message from {$name} <br> <b>Message: </b> {$message} <br> <b>E-mail: </b> {$email}";

                if(send_mail("", "Site Contact Message | $subject", $email_message)){
                    //TODO add alert
                    echo "success";
                }else{
                    //TODO add alert
                    echo "error";
                }

            }else{
                //TODO add alert
                redirect(base_url("contact"));
            }
        }
    }

    public function make_me_member()
    {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("subscribe_email", "email", "trim|required|valid_email");

        if($this->form_validation->run() === FALSE){
            //TODO add alert
            redirect(base_url("contact"));
        }else{
          $this->load->model("members_model");

          $this->members_model->add_db(
            $insert = array(
                "email" => $this->input->post("subscribe_email"),
                "ip_address" => $this->input->post("ip_address"),
                "isActive" => 1,
                "createdAt" => date("Y-m-d H:i:s")
            )
          );

          if($insert){
              //TODO add alert
          }else{
              //TODO add alert

          }

        }

        redirect(base_url("contact"));

    }

    public function get_news()
    {
        $view_data = new stdClass();
        $view_data->view_folder = "news_list_view";
        $this->load->model("news_model");

        $view_data->news = $this->news_model->get_all(
            array(
                "isActive" => 1
            ), "rank DESC"
        );

        //print_r($view_data->news); die();

        $this->load->view($view_data->view_folder, $view_data);
    }

    public function news($url)
    {

        if($url != ""){

            $view_data = new stdClass();

            $view_data->view_folder = "news_view";

            $this->load->model("news_model");

            $news = $this->news_model->get_row(
                array(
                    "isActive" => 1,
                    "url"      => $url
                )
            );

            if($news){
                $view_data->news = $news;

                $view_data->recent_news_list = $this->news_model->get_limit_all(
                    array(
                        "isActive" => 1,
                        "id !="    => $news->id
                    ), "rank DESC",array("count" => 1,"start" => 0)
                );

                $view_count = $news->view_count + 1;

                $this->news_model->update_db(
                    array(
                        "id" => $news->id
                    ),
                    array(
                        "view_count" => $view_count
                    )
                );

                $view_data->news->view_count = $view_count;
                $view_data->opengraph = true;

                $this->load->view($view_data->view_folder, $view_data);
            }else{
                //TODO add alert
            }


        }else{
            //TODO add alert
        }

    }
}