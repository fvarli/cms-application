<br>
<br>
<br>
<section class="main-container">

    <div class="container">
        <div class="row">

            <!-- main start -->
            <!-- ================ -->
            <div class="main col-md-12">

                <!-- page-title start -->
                <!-- ================ -->
                <h1 class="page-title"><?php echo $gallery->title;?></h1>
                <div class="separator-2"></div>
                    <div class="row grid-space-20">
                        <?php if(!empty($files)) {?>

                            <table class="table table-hover table-striped table-bordered table-colored">
                                <thead>
                                <th>File Name</th>
                                <th>Download</th>
                                </thead>
                                <tbody>
                                    <?php foreach ($files as $file) {?>
                                        <tr>
                                            <td>
                                                <?php echo $file->file_url;?>
                                            </td>
                                            <td style="width: 100px">
                                                <a target="_blank" href="" class="btn btn-animated btn-default">Download <i class="pl-10 fa fa-download"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                        <?php } else {?>
                            <div class="col-md-12">
                                <div class="alert alert-warning text-center">
                                    Unfortunately, there is no any data here.
                                </div>
                            </div>
                        <?php } ?>
                        <div class="col-md-12">
                            <a href="<?php echo base_url("file-gallery");?>" class="btn btn-default">
                                <i class="fa fa-arrow-left"></i> Come Back
                            </a>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</section>