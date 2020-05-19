<?php if(empty($item_images)){ ?>

    <div class="alert alert-info text-center">
        <p>There is no image here.</p>
    </div>

<?php } else { ?>

    <table class="table table-bordered table-striped table-hover images_list">
        <thead>
        <th class="order"><i class="fa fa-reorder"></i></th>
        <th>#id</th>
        <th>Image</th>
        <th>Image Name</th><!-- TODO lecture 158 show name -->
        <th>Status</th>
        <th>Cover Image</th>
        <th>Process</th>
        </thead>
        <tbody class="sortable data-url="<?php echo base_url("portfolios/imageRankSetter")?>">

        <?php foreach ($item_images as $image){?>

            <tr id="ord-<?php echo $image->id?>">
                <td class="order text-center"><i class="fa fa-reorder"></i></td>
                <td class="w50 text-center">#<?php echo $image->id; ?></td>
                <td class="text-center">
                    <img width="30"
                         src="<?php echo get_picture_to_size($viewFolder, $image->img_url, "255x157");?>"
                         alt="<?php echo $image->img_url;?>"
                         class="img-responsive">
                </td>
                <td class="text-center"><?php $image->img_url;?></td>
                <td class="w100 text-center">
                    <label class="switch">
                        <input
                            data-url = "<?php echo  base_url("portfolios/imageIsActiveSetter/$image->id");?>"
                            class="isActive"
                            type="checkbox"
                            data-switchery
                            <?php echo ($image->isActive) ? "checked" : ""; ?>/>
                        <span class="slider round"></span>
                    </label>
                </td>
                <td class="text-center">
                    <label class="switch">
                        <input
                                data-url = "<?php echo  base_url("portfolios/isCoverSetter/$image->id/$image->portfolio_id");?>"
                                class="isCover"
                                type="checkbox"
                                data-switchery
                            <?php echo ($image->isCover) ? "checked" : ""; ?>/>
                        <span class="slider round"></span>
                    </label>
                </td>
                <td class="w100 text-center">
                    <button
                        data-url="<?php echo base_url("portfolios/delete_record/$image->id/$image->portfolio_id");?>"
                        class="btn btn-sm btn-danger btn-remove btn-block">
                        <i class="fa fa-trash"></i> Delete
                    </button>
                </td>
            </tr>

        <?php } ?>

        </tbody>
    </table>
<?php } ?>