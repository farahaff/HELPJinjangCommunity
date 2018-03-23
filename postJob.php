<?php
require_once 'inc/dbcall.php';
$db = new Db();
//if not set
if (!isset($_SESSION['name'])) {
    $db->redirect('login.php');
}
//signout
if (isset($_GET['logout'])) {
    unset($_SESSION["name"]);
    $_SESSION["logoutmsg"] = "Succefully signed out";
    $db->redirect('login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Jinjang Transformation Initiative</title>

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

        <!-- Custom styles for this template -->
        <link href="css/agency.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/datable.css">
    </head>
    <body id="page-top">
        <!-- Navigation
      //-->
        <nav class="navbar new navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="home.php"><img src="img/logo4.png" height="45px"; width="250px";></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse dropdown-content" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="home.php">Home</a>
                        </li>
                        <?php // $_SESSION['usertype'];// USER TYpe = 1 member , 2= trainer     ?>

                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="#page-top">Post Job Vacancy</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="manageJobs.php">Manage Jobs</a>
                            </li>

                        <!-- if member show this
                        <?php if ($_SESSION['usertype'] == 1): ?>
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="registerSession.php">Register Session</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="viewHistoryMember.php">View Training History</a>
                            </li>
                        <?php endif; ?>
                      -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Profile
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" id="navbarResponsive">
                                <a class="dropdown-item js-scroll-trigger" href="#"><?php echo $_SESSION['name']; ?></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item js-scroll-trigger" href="editProfile.php">Edit Profile</a>
                                <a class="dropdown-item js-scroll-trigger" href="home.php?logout">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

<!-- Contact -->
<section id="signup">
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">Post Job Vacancy</h2>
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
            if ($_POST['jobtitle']!=""&&$_POST['jobdescription']!=""&&$_POST['reqqualification']!=""&&$_POST['reqskills']!=""&&$_POST['starttime']!=""&&$_POST['endtime']!=""&&$_POST['address']!=""&&$_POST['salary']!=""&&$_POST['preferences']!=""){

                    $sql = "INSERT INTO `jobposting` (`jobtitle`, `jobdescription`,`reqQualifications`, `reqskills`, `starttime`, `endtime`, `address`, `salary`, `preferences`, `createdby`)
                                    VALUES ('{$_POST['jobtitle']}', '{$_POST['jobdescription']}','{$_POST['reqqualification']}', '{$_POST['reqskills']}',  '{$_POST['starttime']}', '{$_POST['endtime']}',
                                      '{$_POST['address']}','{$_POST['salary']}','{$_POST['preferences']}',{$_SESSION['uniqueID']})";

                if (($db->query($sql))) {
                    echo '<div class="alert alert-success">
                <strong>Success!</strong> Job Posting Saved.
            </div>';



                }
              //}
            }


          else {


                  echo "<div class='row alert alert-success' >
              <div class='col-lg-12'>Please fill out the mandatory fields.</div></div>";
              }

          }
        ?>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="member" role="tabpanel"><br/></br>
                <div class="row">
                    <div class="col-lg-12 offset-md-3">
                        <form  name="recordt" id="member" method="POST" action="#" novalidate >
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" id="jobtitle" name="jobtitle" type="text"  onblur="validateJobTitle()"  value="" placeholder="Job Title*" required></input>
                                        <p class="text-danger" id="jtitle"></p>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" id="jobdescription" name="jobdescription" type="textarea" placeholder="Job Description*" onblur="validateJobDescription()"   required value=""></textarea>
                                        <p class="help-block text-danger" id="jdescription"></p>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" id="reqqualification" name="reqqualification" type="textarea" placeholder="Required Qualifications*" onblur="validateJobQualification()"  required value=""></textarea>
                                        <p class="help-block text-danger" id="rqualification" ></p>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" id="reqskills" name="reqskills" type="textarea" placeholder="Required Skills*"  onblur="validateJobSkills()" required value=""></textarea>
                                        <p class="help-block text-danger" id="rskills"></p>
                                    </div>
                                    <div class="form-group">
                                      Job Timings: &nbsp <input id="starttime" name="starttime" type="time" placeholder="Start Time*" required onblur="validateJobTimings()">
                                      &nbsp to &nbsp <input id="endtime" name="endtime" type="time" placeholder="End Time*" required onblur="validateJobTimings()">
                                      <p class="text-danger" id="sTime"></p>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" id="address" name="address" type="textarea" placeholder="Address*" required onblur="validateJobAddress()" onfocus="validateRecordTraining()"></textarea>
                                        <p class="help-block text-danger" style="color: red;" id="jaddress"></p>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" id="salary" name="salary" type="number"  value="" placeholder="Salary*" required >
                                        <!--<p class="text-danger" style="color: red;" id="jsalary"></p>-->
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" id="preferences" name="preferences" type="textarea" placeholder="Preferences*" required onblur="validateJobPreferences()"></textarea>
                                        <p class="help-block text-danger" style="color: red;" id="jpreferences"></p>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-lg-12 text-center">
                                        <br/>
                                        <div id="success"></div>
                                        <button id="resetButton" class="btn btn-primary btn-xl text-uppercase" type="reset">Reset</button>
                                        <button name="record" class="btn btn-primary btn-xl text-uppercase" type="submit" >Submit</button>
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
