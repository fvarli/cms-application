<?php $settings = get_settings();?>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta name="description" content="Admin, Dashboard, Bootstrap" />

<?php if($settings->logo == "default"){
    $favicon_image = base_url("assets"). "/assets/images/logo.png";
}else{
    $favicon_image = get_picture_to_size("settings_view", $settings->favicon, "32x32");
}
 ?>
<link rel="shortcut icon" sizes="32x32" href="<?php echo $favicon_image; //TODO show favicon - video 291?>">
<title>Ferzender Varli - <?php echo $settings->company_name;?></title>

<?php $this->load->view("/includes/include_style");?>