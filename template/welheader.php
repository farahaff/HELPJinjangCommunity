<?php
session_start();
unset($_SESSION["logoutmsg"]);
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Jinjang Reformation Initiative</title>

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


    </head>

    <body id="page-top">

        <!-- Navigation
      //-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">JINJANG REFORMATION INITIATIVE <small><br>by HELP Group</small></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse dropdown-content" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#about">Info</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                About Us
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" id="navbarResponsive">
                                <a class="dropdown-item js-scroll-trigger" href="#">About AGN</a>
                                <a class="dropdown-item js-scroll-trigger" href="updateInfo.php">Our Work</a>
                                <a class="dropdown-item js-scroll-trigger" href="home.php?logout">Literacy & Numeracy <br>Programme</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                How To Help
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" id="navbarResponsive">
                                <a class="dropdown-item js-scroll-trigger" href="#">Vounteering</a>
                                <a class="dropdown-item js-scroll-trigger" href="updateInfo.php">Learning Materials</a>
                                <a class="dropdown-item js-scroll-trigger" href="home.php?logout">Children School Supplies</a>
                                <a class="dropdown-item js-scroll-trigger" href="home.php?logout">Sponsor a Child</a>
                                <a class="dropdown-item js-scroll-trigger" href="home.php?logout">E-Business</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Donations
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" id="navbarResponsive">
                                <a class="dropdown-item js-scroll-trigger" href="#">Donate Now</a>
                                <a class="dropdown-item js-scroll-trigger" href="updateInfo.php">Make a Pledge</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                News/Past Events
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" id="navbarResponsive">
                                <a class="dropdown-item js-scroll-trigger" href="#">Photo Gallery</a>
                                <a class="dropdown-item js-scroll-trigger" href="updateInfo.php">Newspaper Write Ups</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="login.php">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Header -->
        <header class="masthead">
            <div class="container">
                <div class="intro-text">
                    <div class="intro-lead-in">Impact a life, transform a community</div>
                    <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="signup.php">Sign up</a>
                </div>
            </div>
        </header>
