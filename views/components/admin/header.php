<?php 
$current_page = str_replace('/cathotel-mvc/','',strtolower($_SERVER['REQUEST_URI']));
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Admin Panel</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="<?php echo ROOT_DIRECTORY; ?>public/assets/css/admin_bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="<?php echo ROOT_DIRECTORY; ?>public/assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="<?php echo ROOT_DIRECTORY; ?>public/assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="<?php echo ROOT_DIRECTORY; ?>public/assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://localhost:8080/cathotel-mvc" class="simple-text">
                    Cat Hotel
                </a>
            </div>

            <ul class="nav">
                <li class="<?php if($current_page == 'admin') {echo 'active';}?>">
                    <a href="admin">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="<?php if($current_page == 'users') {echo 'active';}?>">
                    <a href="users">
                        <i class="pe-7s-user"></i>
                        <p>User List</p>
                    </a>
                </li>
                <li class="<?php if($current_page == 'rooms') {echo 'active';}?>">
                    <a href="rooms">
                        <i class="pe-7s-note2"></i>
                        <p>Room</p>
                    </a>
                </li>
                <li class="<?php if($current_page == 'cat-questions') {echo 'active';}?>">
                    <a href="cat-questions">
                        <i class="pe-7s-note2"></i>
                        <p>Cat Questions</p>
                    </a>
                </li>
                <li class="<?php if($current_page == 'booking-list') {echo 'active';}?>">
                    <a href="booking-list">
                        <i class="pe-7s-note2"></i>
                        <p>Bookings</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">

                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
										Setting
										<b class="caret"></b>
									</p>

                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="change-password">Change Password</a></li>
                                <li><a href="user-profile">Profile</a></li>
                              </ul>
                        </li>
                        <li>
                            <a href="logout">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>