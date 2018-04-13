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

<?php
$name = $_SESSION['name'];
$uniqueid = $_SESSION['uniqueID'];
$sql = "SELECT * FROM `employer` WHERE `userID` =" . $uniqueid . " LIMIT 1";
$result = $db->query($sql);
$row = mysqli_fetch_assoc($result);
$pwd = $row['ePassword'];

$one = null;
$two = null;
$three = null;
$four = null;
$five = null;
$six = null;
$seven = null;
$eight = null;
$nine = null;
$ten = null;
$eleven = null;
$twelve = null;
$thirteen = null;
$fourteen = null;
$fifteen = null;
if ($row['industry'] == 'Agriculture') {
    $one = "SELECTED";
} elseif ($row['industry'] == 'Automotive') {
    $two = "SELECTED";
} elseif ($row['industry'] == 'Construction') {
    $three = "SELECTED";
} elseif ($row['industry'] == 'Cosmetics') {
    $four = "SELECTED";
} elseif ($row['industry'] == 'Education') {
    $five = "SELECTED";
} elseif ($row['industry'] == 'Engineering') {
    $six = "SELECTED";
} elseif ($row['industry'] == 'Entertainment') {
    $seven = "SELECTED";
} elseif ($row['industry'] == 'Finance') {
    $eight = "SELECTED";
} elseif ($row['industry'] == 'Food') {
    $nine = "SELECTED";
} elseif ($row['industry'] == 'Health Care') {
    $ten = "SELECTED";
} elseif ($row['industry'] == 'Information Technology') {
    $eleven = "SELECTED";
} elseif ($row['industry'] == 'Marketing') {
    $twelve = "SELECTED";
} elseif ($row['industry'] == 'Media & Communication') {
    $thirteen = "SELECTED";
} elseif ($row['industry'] == 'Pharmaceutical') {
    $fourteen = "SELECTED";
} elseif ($row['industry'] == 'Others') {
    $fifteen = "SELECTED";
}


$profitable = null;
$nonprofit = null;
if ($row['profitability'] == 'Profitable') {
    $profitable = "CHECKED";
} elseif ($row['profitability'] == 'Non-Profit') {
    $nonprofit = "CHECKED";
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
                                <a class="nav-link js-scroll-trigger" href="postJob.php">Post Job</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="manageJobs.php">Manage Jobs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="employerApplicationHistory.php">Manage Applications</a>
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
                              <p class="dropdown-item js-scroll-trigger" href="#"><strong><?php echo $_SESSION['name']; ?></strong></p>
                              <div class="dropdown-divider"></div>
                                <a class="dropdown-item js-scroll-trigger" href="#page-top">Edit Profile</a>
                                <a class="dropdown-item js-scroll-trigger" href="home.php?logout">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

<!-- Contact -->
<section id="signup">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">Edit Profile</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <?php
                if (isset($_POST['update'])) {
                        if (isset($_POST['ePassword']) && !empty($_POST['ePassword'])) {
                            $upwd = $db->makepwd($_POST['ePassword']);
                            $sql = "UPDATE `employer` SET `password` = '{$upwd}', `orgName` = '{$_POST['orgName']}', `industry` = '{$_POST['industry']}', `profitability` = '{$_POST['ctype']}',
                             `email` = '{$_POST['empEmail']}', `phoneNo` = '{$_POST['phoneNo']}' WHERE `employer`.`userID` = " . $uniqueid;
                        } else {
                            $sql = "UPDATE `employer` SET  `orgName` = '{$_POST['orgName']}', `industry` = '{$_POST['industry']}', `profitability` = '{$_POST['ctype']}',
                            `email` = '{$_POST['empEmail']}', `phoneNo` = '{$_POST['phoneNo']}' WHERE `employer`.`userID` = " . $uniqueid;
                        }
                        echo '<div class="alert alert-success">
                                    <strong>Success!</strong> Your profile has been updated!
                            </div>';
                    $db->query($sql);
                }
                ?>
            </div>

        </div>
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="member" role="tabpanel"><br/></br>
                <div class="row">
                    <div class="col-lg-12 offset-md-3">
                        <form  name="sentMessage" novalidate method="POST" action="#">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" id="eUsername" type="text" placeholder="<?php echo $name; ?>" disabled="disabled" required data-validation-required-message="Please enter your username." required>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" id="ePassword" type="password" name="ePassword" placeholder="Enter new password or leave blank to keep existing password" required data-validation-required-message="Please enter your password.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" id="orgName" type="text" name="orgName" value="<?php echo $row['orgName']; ?>" placeholder="Name of Organization*">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" id="industry" name="industry">
                                            <option value="" disabled>Type of Organization</option>
                                            <option value="Agriculture" <?php echo $one; ?>>Agriculture</option>
                                            <option value="Automotive" <?php echo $two; ?>>Automotive</option>
                                            <option value="Construction" <?php echo $three; ?>>Construction</option>
                                            <option value="Cosmetics" <?php echo $four; ?>>Cosmetics</option>
                                            <option value="Education" <?php echo $five; ?>>Education</option>
                                            <option value="Engineering" <?php echo $six; ?>>Engineering</option>
                                            <option value="Entertainment" <?php echo $seven; ?>>Entertainment</option>
                                            <option value="Finance" <?php echo $eight; ?>>Finance</option>
                                            <option value="Food" <?php echo $nine; ?>>Food</option>
                                            <option value="Health Care" <?php echo $ten; ?>>Health Care</option>
                                            <option value="Information Technology" <?php echo $eleven; ?>>Information Technology</option>
                                            <option value="Marketing" <?php echo $twelve; ?>>Marketing</option>
                                            <option value="Media & Comunication" <?php echo $thirteen; ?>>Media & Comunication</option>
                                            <option value="Pharmaceutical" <?php echo $fourteen; ?>>Pharmaceutical</option>
                                            <option value="Others" <?php echo $fifteen; ?>>Others</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="radio-inline"><input type="radio" id="ctype" onclick="test();" value="Profitable" name="ctype" <?php echo $profitable; ?>>&nbsp;Profitable</label>
                                      <label class="radio-inline"><input type="radio" id="ctype" value="Non-Profit" name="ctype" <?php echo $nonprofit; ?>>&nbsp;Non-Profit</label>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" id="empEmail" type="email" name="empEmail" value="<?php echo $row['email']; ?>" placeholder="Email*" required data-validation-required-message="Please enter your email.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" id="phoneNo" type="number" name="phoneNo" value="<?php echo $row['phoneNo']; ?>" placeholder="Phone No*" required data-validation-required-message="Please enter your mobile number.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-lg-12 text-center">
                                    <br/>

                                    <div class="clearfix"></div>
                                    <div class="col-lg-12 text-center">
                                        <br/>
                                        <div id="success"></div>
                                        <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" name="update" type="submit">Update</button>
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
