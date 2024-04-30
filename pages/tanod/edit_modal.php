<?php echo 

'<div id="editModal'.$row['id'].'" class="modal fade">

<form class="form-horizontal" method="post" enctype="multipart/form-data">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Edit Staff Information</h4>
        </div>
        <div class="modal-body">';

        $edit_query = mysqli_query($con,"SELECT * from tbltanod where id = '".$row['id']."' ");
        $erow = mysqli_fetch_array($edit_query);

        echo '
            <div class="row">
                <div class="container-fluid">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">

                        <input type="hidden" value="'.$erow['id'].'" name="hidden_id" id="hidden_id"/>
                            <label class="control-label">Name:</label><br>
                            <div class="col-sm-4">
                                <input name="txt_edit_fname" class="form-control input-sm" type="text" value="'.$erow['fname'].'"/>
                            </div> 
                            <div class="col-sm-4">
                                <input name="txt_edit_mname" class="form-control input-sm" type="text" value="'.$erow['mname'].'"/>
                            </div> 
                            <div class="col-sm-4">
                                <input name="txt_edit_lname" class="form-control input-sm" type="text" value="'.$erow['lname'].'"/>
                            </div> <br>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Position:</label>
                            <input name="txt_edit_position" class="form-control input-sm" type="text" value="'.$erow['position'].'"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Schedule:</label>
                            <input name="txt_edit_sched" class="form-control input-sm" type="date" value="'.$erow['sched'].'"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Contact:</label>
                            <input name="txt_edit_contact" class="form-control input-sm" type="text" value="'.$erow['contact'].'"/>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Address:</label>
                            <input name="txt_edit_address" class="form-control input-sm" type="text" value="'.$erow['address'].'"/>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Birthday:</label>
                            <input name="txt_edit_bday" class="form-control input-sm" type="date" value="'.$erow['bday'].'"/>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Image:</label>
                            <input name="txt_edit_image" class="form-control input-sm" type="file" />
                        </div>

                    </div>

                    </div>
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
            <input type="submit" class="btn btn-primary btn-sm" name="btn_save" value="Save"/>
        </div>
    </div>
  </div>
</form>
</div>';?>