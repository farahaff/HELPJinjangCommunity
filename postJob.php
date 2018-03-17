<?php require_once './template/header.php'; ?>

<!-- Contact -->
<section id="signup">
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">Post Job Vacancy</h2><br/>
            </div>
        </div>
        <?php
        //array(6) { ["title"]=> string(0) "" ["date"]=> string(0) "" ["time"]=> string(0) "" ["fee"]=> string(0) "" ["ctype"]=> string(1) "2" ["record"]=> string(0) "" }
        if (isset($_POST['record'])) {
            //if (empty($_POST['jobtitle']) || $_POST['jobtitle'] == "" || empty($_POST['jobdescription']) || empty($_POST['reqqualification']) || empty($_POST['reqskills'])) {
              //  echo '<div class="alert alert-danger">
                //<strong>Warning!</strong> Please fill all the fields!
            //</div>';
            //} else {
                    $sql = "INSERT INTO `jobpostings` (`jobtitle`, `jobdescription`,`reqqualification`, `reqskills`, `starttime`, `endtime`, `address`, `salary`, `preferences`, `createdby`)
                                    VALUES ('{$_POST['jobtitle']}', '{$_POST['jobdescription']}','{$_POST['reqqualification']}', '{$_POST['reqskills']}',  '{$_POST['starttime']}', '{$_POST['endtime']}',
                                      '{$_POST['address']}','{$_POST['salary']}','{$_POST['preferences']}',{$_SESSION['uniqueID']})";

                if (($db->query($sql))) {
                    echo '<div class="alert alert-success">
                <strong>Success!</strong> Data has been saved to the database!
            </div>';
                }
              //}
            }
        ?>
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="member" role="tabpanel"><br/></br>
                <div class="row">
                    <div class="col-lg-12 offset-md-3">
                        <form  name="recordt" id="member" method="POST" action="#" novalidate>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" id="jobtitle" name="jobtitle" type="text"  onblur="validateRecordTraining()"  value="" placeholder="Job Title*" required >
                                        <p class="text-danger" style="color: red;" id="jtitle"></p>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" id="jobdescription" name="jobdescription" type="textarea" placeholder="Job Description*" onblur="validateRecordTraining()"   required value=""></textarea>
                                        <p class="help-block text-danger" id="jdescription"></p>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" id="reqqualification" name="reqqualification" type="textarea" placeholder="Required Qualifications*" onblur="validateRecordTraining()"  required></textarea>
                                        <p class="help-block text-danger" style="color: red;" id="mtime" ></p>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" id="reqskills" name="reqskills" type="textarea" placeholder="Required Skills*" required onblur="validateRecordTraining()" onfocus="validateRecordTraining()"></textarea>
                                        <p class="help-block text-danger" style="color: red;" id="mfee"></p>
                                    </div>
                                    <div class="form-group">
                                      Job Timings: &nbsp <input id="starttime" name="starttime" type="time" placeholder="Start Time*" required data-validation-required-message="Please enter your mobile number.">
                                      &nbsp to &nbsp <input id="endtime" name="endtime" type="time" placeholder="End Time*" required data-validation-required-message="Please enter your mobile number.">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" id="address" name="address" type="textarea" placeholder="Address*" required onblur="validateRecordTraining()" onfocus="validateRecordTraining()"></textarea>
                                        <p class="help-block text-danger" style="color: red;" id="mfee"></p>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" id="salary" name="salary" type="number"  onblur="validateRecordTraining()"  value="" placeholder="Salary*" required >
                                        <p class="text-danger" style="color: red;" id="mtitle"></p>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" id="preferences" name="preferences" type="textarea" placeholder="Preferences*" required onblur="validateRecordTraining()" onfocus="validateRecordTraining()"></textarea>
                                        <p class="help-block text-danger" style="color: red;" id="mfee"></p>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-lg-12 text-center">
                                        <br/>
                                        <div id="success"></div>
                                        <button id="resetButton" class="btn btn-primary btn-xl text-uppercase" type="reset">Reset</button>
                                        <button name="record" class="btn btn-primary btn-xl text-uppercase" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>


    </div>
</section>

<?php
require_once './template/footer.php';
