<?php

$alert = $this->session->userdata("alert");

if($alert){

    if($alert["type"] === "success"){ ?>

        <script>
            iziToast.success({
                title: 'Hey',
                message: '<?php echo $alert["text"]?>',
                position: "topCenter"
            })
        </script>

    <?php }else{ ?>
        <script>
            iziToast.error({
                title: 'Hey',
                message: '<?php echo $alert["text"]?>',
                position: "topCenter"
            })
        </script>
    <?php }
}
?>