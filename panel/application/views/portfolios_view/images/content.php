<style>
    .switch {
        position: relative;
        display: inline-block;
        width:44px;
        height: 24px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .3s;
        transition: .3s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 20px;
        width: 20px;
        left: 2px;
        bottom: 2px;
        background-color: white;
        -webkit-transition: .3s;
        transition: .43s;
    }

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(20px);
        -ms-transform: translateX(20px);
        transform: translateX(20px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 30px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>

<div class="row">
        <div class="col-md-12">
            <h4 class="m-b-lg">
               You edit <b><?php echo $item->title?></b> Image
            </h4>
        </div><!-- END column -->

        <div class="col-md-12">
            <div class="widget">

                <div class="widget-body">

                    <?php if(is_allowed_update_module()) { ?>

                        <form data-url="<?php echo base_url("portfolios/refresh_image_list/$item->id");?>" action="<?php echo base_url("portfolios/upload_image/$item->id");?>" id="dropzone" class="dropzone" data-plugin="dropzone" data-options="{url: '<?php echo base_url("portfolios/upload_image/$item->id");?>'}">
                            <div class="dz-message">
                                <h3 class="m-h-lg">Drop files here or click to upload.</h3>
                                <p class="m-b-lg">(This is just a demo dropzone. Selected files are not actually uploaded.)</p>
                            </div>
                        </form>

                    <?php } ?>

                </div><!-- .widget-body -->
            </div><!-- .widget -->
        </div><!-- END column -->
</div>

<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Table
        </h4>
    </div><!-- END column -->

    <div class="col-md-12">
        <div class="widget">

            <div class="widget-body image_list_container">

                <?php $this->load->view("{$viewFolder}/{$subViewFolder}/render_elements/image_list_view");?>

            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>