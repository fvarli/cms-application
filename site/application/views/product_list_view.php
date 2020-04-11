<!DOCTYPE html>
<html dir="tr" lang="tr">
<!--<![endif]-->
<head>
    <?php $this->load->view("includes/head");?>
</head>

<body class="transparent-header front-page page-loader-5">

    <!-- scrollToTop -->
    <!-- ================ -->
    <div class="scrollToTop circle"><i class="icon-up-open-big"></i></div>

    <div class="page-wrapper">
        <?php $this->load->view("includes/header");?>

        <?php $this->load->view("{$view_folder}/content");?>

        <?php $this->load->view("includes/footer");?>
    </div>
    <?php $this->load->view("includes/include_script");?>

</body>
</html>