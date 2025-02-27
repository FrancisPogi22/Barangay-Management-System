<!-- ========================= MODAL ======================= -->
<div id="disapproveModal<?php echo $row['pid'] ?>" class="modal fade">
    <form method="post">
        <div class="modal-dialog modal-sm" style="width:300px !important;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Disapprove Clearance</h4>
                </div>
                <div class="modal-body">
                    <?php
                    echo '
                <input type="hidden" value="' . $row['pid'] . '" name="hidden_id" id="hidden_id"/>';
                    ?>
                    <p>Are you sure you want to disapproved this clearance? If yes, put the findings.</p>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Findings:</label>
                                <input name="txt_findings" class="form-control input-sm" type="text" placeholder="Findings" />
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel" />
                    <input type="submit" class="btn btn-primary btn-sm" name="btn_disapprove" value="Disapprove" />
                </div>
            </div>
        </div>
    </form>
</div>