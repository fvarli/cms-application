<?php $settings = get_settings();?>

<meta charset="utf-8">
    <title><?php echo $settings->company_name . " | " . $settings->slogan;?></title>
    <meta name="description" content="<?php echo $settings->mission;?>">
    <meta name="author" content="iletisim@ferzendervarli.com">

    <!-- Mobile Meta -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<?php $this->load->view("includes/include_style"); ?>