<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view("/includes/header");?>
    <?php $this->load->view("{$viewFolder}/{$subViewFolder}/page_style");?>
</head>

<body class="simple-page">
<!--============= start main area -->




            <?php $this->load->view("{$viewFolder}/{$subViewFolder}/content")?>

<?php $this->load->view("{$viewFolder}/{$subViewFolder}/page_script");?>



</body>
</html>