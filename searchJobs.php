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
$sql = "SELECT * FROM `jobposting` WHERE `status`='open'";
$result = $db->query($sql);
$numRows = $db->numRows($result);
?>
<script>
    $('#portfolioModal1').on('show.bs.modal', function () {
        alert("before model load");
    })
</script>

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
                <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="img/logo4.png" height="45px"; width="250px";></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse dropdown-content" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="home.php">Home</a>
                        </li>
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="#page-top">Job Postings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="jobSeekerApplicationHistory.php">My Applications</a>
                            </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="">
                                Profile
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" id="navbarResponsive">
                              <p class="dropdown-item js-scroll-trigger" href="#"><strong><?php echo $_SESSION['name']; ?></strong></p>
                              <div class="dropdown-divider"></div>
                                <a class="dropdown-item js-scroll-trigger" href="editProfile.php">Edit Profile</a>
                                <a class="dropdown-item js-scroll-trigger" href="home.php?logout">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


<!-- Portfolio Grid -->
<section class="bg-light" id="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center"><br>
              <?php if ($numRows > 0): ?>
                <h2 class="section-heading text-uppercase">Job Postings</h2><br>
              <?php else: ?>
                <h2>No Jobs Available</h2><br><br><br><br><br><br><br>
              <?php endif; ?>
            </div>
        </div>

        <?php if ($numRows > 0): ?>
            <!--- display all teh  available training sessions !-->
            <div class="row">
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <?php
                    $sql2 = "SELECT * FROM `jobtype` WHERE `idjtype`=" . $row['jtype'] . " LIMIT 1";
                    $result2 = $db->query($sql2);
                    //get the session type mma,sport,dance
                    $rowctype = mysqli_fetch_assoc($result2);
                    ?>
                    <div class="col-md-4 col-sm-6 portfolio-item">
                        <a class="portfolio-link" data-toggle="modal" onclick="loadModel(<?php echo $row['jobID']; ?>);" href="#portfolioModal1">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content">
                                    <i class="fa fa-plus fa-3x"></i>
                                </div>
                            </div>
                            <img class="img-fluid" src="img/portfolio/<?php echo $rowctype['img']; ?>.jpg" alt="<?php echo $rowctype['img']; ?>">
                        </a>
                        <?php
                        $sql3 = "SELECT * FROM `employer` WHERE `userID`=" . $row['createdBy'] . " LIMIT 1";
                        $result3 = $db->query($sql3);
                        //get the session type mma,sport,dance
                        $employer = mysqli_fetch_assoc($result3);
                        ?>
                        <div class="portfolio-caption" style="padding:15px">
                            <h4><?php echo strtoupper($row['jobTitle']); ?></h4>
                            <p class="text-muted" style="font-size:20px"><?php echo strtoupper($employer['orgName']); ?>
                                <br>(<?php echo $employer['industry']; ?>)
                          </p>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Portfolio Modals -->

<!-- Modal 1 -->
<div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl"></div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class=" modal-body">
                            <div id="content">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once './template/footer.php';
