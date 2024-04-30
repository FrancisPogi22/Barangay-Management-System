<?php echo 

'<div id="editModal'.$row['resident_id'].'" class="modal fade">

<form class="form-horizontal" method="post" enctype="multipart/form-data">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Edit Staff Information</h4>
        </div>
        <div class="modal-body">';

        $edit_query = mysqli_query($con,"SELECT * from resident where resident_id = '".$row['resident_id']."' ");
        $erow = mysqli_fetch_array($edit_query);

        echo '
                         <div class="row">
                            <div class="container-fluid">
                                <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                            <label class="control-label">Name:</label><br>
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-6" style="margin-bottom: 10px;">
                                        <input name="txt_fname" class="form-control input-sm" type="text" placeholder="Firstname"/>
                                    </div>
                                    <div class="col-sm-6" style="margin-bottom: 10px;">
                                        <input name="txt_mname" class="form-control input-sm" type="text" placeholder="Middlename"/>
                                    </div>
                                    <div class="col-sm-6" style="margin-bottom: 10px;">
                                        <input name="txt_lname" class="form-control input-sm" type="text" placeholder="Lastname"/>
                                    </div>
                                </div>
                            </div>
                        </div>


                                    <div class="form-group">
                                    <label class="control-label">Address:</label><br>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-6" style="margin-bottom: 10px;">
                                                <input name="houseNo" class="form-control input-sm" type="text" placeholder="House Number"/>
                                            </div>
                                            <div class="col-sm-6" style="margin-bottom: 10px;">
                                                <input name="purok" class="form-control input-sm" type="text" placeholder="Street"/>
                                            </div>
                                            <div class="col-sm-6" style="margin-bottom: 10px;">
                                                <input name="brgy" class="form-control input-sm" type="text" value="North Poblacion"/>
                                            </div>
                                            <div class="col-sm-6" style="margin-bottom: 10px;">
                                                <input name="municipality" class="form-control input-sm" type="text" value="Gabaldon"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                    <div class="form-group">
                                        <label class="control-label">Contact Number:</label>
                                        <input name="contact" class="form-control input-sm input-size" type="text"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Civil Status:</label>
                                        <input name="civil_status" class="form-control input-sm input-size" type="text"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Work/Occupation:</label>
                                        <input name="occupation" class="form-control input-sm input-size" type="text"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Monthly Income:</label>
                                        <input name="monthly_income" class="form-control input-sm input-size" type="text"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Age:</label>
                                        <input name="age" class="form-control input-sm input-size" type="text"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Birthday:</label>
                                        <input name="bday" class="form-control input-sm input-size" type="date"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Image:</label>
                                        <input name="txt_image" class="form-control input-sm" type="file" />
                                    </div>

                                </div>

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