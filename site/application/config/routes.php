<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route["products"]                  = "home/product_list";
$route["product-detail/(:any)"]     = "home/product_detail/$1";

$route["portfolios"]                = "home/portfolio_list";
$route["portfolio-detail/(:any)"]   = "home/portfolio_detail/$1";

$route["courses"]                   = "home/course_list";
$route["course-detail/(:any)"]      = "home/course_detail/$1";

$route["news"]                      = "home/get_news";
$route["new/(:any)"]                = "home/news/$1";

$route["image-gallery"]             = "home/image_gallery_list";
$route["image-gallery/(:any)"]      = "home/image_gallery/$1";

$route["video-gallery"]             = "home/video_gallery_list";
$route["video-gallery/(:any)"]      = "home/video_gallery/$1";

$route["file-gallery"]              = "home/file_gallery_list";
$route["file-gallery/(:any)"]       = "home/file_gallery/$1";

$route["references"]                = "home/reference_list";
$route["brands"]                    = "home/brand_list";
$route["services"]                  = "home/service_list";
$route["about-us"]                  = "home/about_us";
$route["contact"]                   = "home/contact";
$route["send-message"]              = "home/send_contact_message";
$route["subscribe"]                 = "home/make_me_member";
$route["dont-show-again"]           = "home/popup_never_show_again";