<?php

require_once("inc/dbcall.php");
$db = new Db();
$jobID = $_POST['jobID'];
$sql = "SELECT * FROM `jobposting` WHERE `jobID` =" . $jobID . " LIMIT 1";
$result = $db->query($sql);
$row = mysqli_fetch_assoc($result);
//$time =date('h:m A', strtotime($row['time']));
////get the session type mma,sport,dance
//$rowctype = mysqli_fetch_assoc($result2);
// set teh select box to default selected value


echo "<h3 class='text-uppercase'>{$row['jobTitle']}</h3><br>
            <div class='row'>
                <div class='col-md-12'>
                    <div class='form-group' style='text-align:left;color:#b20000'>
                    Job Title
                        <input class='form-control' id='jobtitle' type='text' onblur='validateJobTitle()' placeholder='{$row['jobTitle']}' value='{$row['jobTitle']}'>
                        <p class='help-block text-danger' id='jtitle'></p>
                    </div>
                    <div class='form-group' style='text-align:left;color:#b20000'>
                    Job Description
                        <textarea class='form-control' id='jobdescription' type='textarea' onblur='validateJobDescription()' placeholder='{$row['jobDescription']}'>{$row['jobDescription']}</textarea>
                        <p class='help-block text-danger' id='jdescription'></p>
                    </div>
                    <div class='form-group' style='text-align:left;color:#b20000'>
                    Required Qualifications
                        <textarea class='form-control' id='reqqualification' type='textarea' onblur='validateJobQualification()' placeholder='{$row['reqQualifications']}'>{$row['reqQualifications']}</textarea>
                        <p class='help-block text-danger' id='rqualification'></p>
                    </div>
                    <div class='form-group' style='text-align:left;color:#b20000'>
                    Required Skills
                        <textarea class='form-control' id='reqskills' type='textarea' onblur='validateJobSkills()' placeholder='{$row['reqSkills']}'>{$row['reqSkills']}</textarea>
                        <p class='help-block text-danger' id='rskills'></p>
                    </div>
                    <div class='form-group' style='text-align:left;color:#b20000'>
                    Start Time
                        <input class='form-control' id='starttime' type='time' onblur='validateJobTimings()' placeholder='{$row['startTime']}' value='{$row['startTime']}' ><br>
                    End Time
                        <input class='form-control' id='endtime' type='time' onblur='validateJobTimings()' placeholder='{$row['endTime']}' value='{$row['endTime']}' >
                        <p class='help-block text-danger' id='sTime'></p>
                    </div>
                    <div class='form-group' style='text-align:left;color:#b20000'>
                    Address
                        <textarea class='form-control' id='address' type='textarea' onblur='validateJobAddress()' placeholder='{$row['address']}'>{$row['address']}</textarea>
                        <p class='help-block text-danger' id='jaddress'></p>
                    </div>
                    <div class='form-group' style='text-align:left;color:#b20000'>
                    Salary
                        <input class='form-control' id='salary' type='number' onblur='validateJobSalary()'  placeholder='{$row['salary']}' value='{$row['salary']}' required >
                        <p class='text-danger' style='color: red; id='jsalary'></p>
                    </div>
                    <div class='form-group' style='text-align:left;color:#b20000'>
                    Preferences
                        <textarea class='form-control' id='preferences' type='textarea' placeholder='{$row['preferences']}' required onblur='validateJobPreferences()'>{$row['preferences']}</textarea>
                        <p class='help-block text-danger' style='color: red;' id='jpreferences'></p>
                    </div>
                    <div class='clearfix'></div>
                    <div class='col-lg-12 text-center'>
                    <br/>
                    <div id='success'></div>
                            <button class='btn btn-primary btn-md text-uppercase' data-dismiss='modal' onclick='editJob({$jobID})' style='padding-top:20px'>Save</button>
                    </div>
                </div>

            </div>";
