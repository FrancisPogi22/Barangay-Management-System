<!-- ========================= MODAL ======================= -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Title Here</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- Custom CSS for the modal -->
    <style>
        .modal-custom {
            max-width: 800px;
            /* Adjust the width as needed */
            margin: 30px auto;
            /* Center the modal */
        }
    </style>
</head>

<body>
    <div id="addCourseModal" class="modal fade">
        <form class="form-horizontal" method="post" enctype="multipart/form-data">
            <div class="modal-dialog modal-custom">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Manage Resident</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="container-fluid">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Name:</label><br>
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-sm-6" style="margin-bottom: 10px;">
                                                    <input name="txt_fname" class="form-control input-sm" type="text" placeholder="Firstname" />
                                                </div>
                                                <div class="col-sm-6" style="margin-bottom: 10px;">
                                                    <input name="txt_mname" class="form-control input-sm" type="text" placeholder="Middlename" />
                                                </div>
                                                <div class="col-sm-6" style="margin-bottom: 10px;">
                                                    <input name="txt_lname" class="form-control input-sm" type="text" placeholder="Lastname" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Address:</label><br>
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-sm-6" style="margin-bottom: 10px;">
                                                    <input name="houseNo" class="form-control input-sm" type="text" placeholder="House Number" />
                                                </div>
                                                <div class="col-sm-6" style="margin-bottom: 10px;">
                                                    <input name="purok" class="form-control input-sm" type="text" placeholder="Street" />
                                                </div>
                                                <div class="col-sm-6" style="margin-bottom: 10px;">
                                                    <input name="brgy" class="form-control input-sm" type="text" value="North Poblacion" />
                                                </div>
                                                <div class="col-sm-6" style="margin-bottom: 10px;">
                                                    <input name="municipality" class="form-control input-sm" type="text" value="Gabaldon" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Contact Number:</label>
                                        <input name="contact" class="form-control input-sm input-size" type="text" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Civil Status:</label>
                                        <input name="civil_status" class="form-control input-sm input-size" type="text" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Work/Occupation:</label>
                                        <input name="occupation" class="form-control input-sm input-size" type="text" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Monthly Income:</label>
                                        <input name="monthly_income" class="form-control input-sm input-size" type="text" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Age:</label>
                                        <input name="age" class="form-control input-sm input-size" type="text" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Birthday:</label>
                                        <input name="bday" class="form-control input-sm input-size" type="date" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Image:</label>
                                        <input name="txt_image" class="form-control input-sm" type="file" />
                                    </div>
                                    <div class="form-group">
                                        <label for="year_stayed">Year of Residence:</label>
                                        <input type="text" class="form-control" id="year_stayed" name="year_stayed" style="width: 200px;" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel" />
                        <input type="submit" class="btn btn-primary btn-sm" name="btn_add" id="btn_add" value="Add Resident" />
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {

            var timeOut = null; // this used for hold few seconds to made ajax request

            var loading_html = '<img src="../../img/ajax-loader.gif" style="height: 20px; width: 20px;"/>'; // just an loading image or we can put any texts here

            //when button is clicked
            $('#username').keyup(function(e) {

                // when press the following key we need not to make any ajax request, you can customize it with your own way
                switch (e.keyCode) {
                    //case 8:   //backspace
                    case 9: //tab
                    case 13: //enter
                    case 16: //shift
                    case 17: //ctrl
                    case 18: //alt
                    case 19: //pause/break
                    case 20: //caps lock
                    case 27: //escape
                    case 33: //page up
                    case 34: //page down
                    case 35: //end
                    case 36: //home
                    case 37: //left arrow
                    case 38: //up arrow
                    case 39: //right arrow
                    case 40: //down arrow
                    case 45: //insert
                        //case 46:  //delete
                        return;
                }
                if (timeOut != null)
                    clearTimeout(timeOut);
                timeOut = setTimeout(is_available, 500); // delay delay ajax request for 1000 milliseconds
                $('#user_msg').html(loading_html); // adding the loading text or image
            });
        });
    </script>
</body>

</html>