<?php
    $popup = get_popup_service($view_folder);
?>

<?php if($popup) {

    $popup_cookie = get_cookie($popup->popup_unique_id);

    if($popup_cookie != "true"){ ?>
        <!-- Modal -->
        <div class="modal fade" id="popup_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4
                            class="modal-title" id="myModalLabel">
                            <?php echo $popup->title;?>
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    </div>
                    <div class="modal-body">
                        <p><?php echo $popup->description;?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-dark" data-dismiss="modal">Close</button>
                        <button
                            data-csrf-key = "<?php echo $this->security->get_csrf_token_name();?>"
                            data-csrf-value = "<?php echo $this->security->get_csrf_hash();?>"
                            data-popup-id = <?php echo $popup->popup_unique_id;?>
                            data-url="<?php echo base_url("dont-show-again")?>"
                            type="button"
                            class="btn btn-sm btn-default never-show-again-btn"
                            data-dismiss="modal">
                            Don't Show Again
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function () {
                $("#popup_model").modal("show");
            })
        </script>
    <?php }
 } ?>