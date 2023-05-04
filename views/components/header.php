<?php 
$current_page = str_replace('/cathotel-mvc/','',strtolower($_SERVER['REQUEST_URI']));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Cat Hotel</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">  

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo ROOT_DIRECTORY; ?>public/assets/css/animate.min.css" rel="stylesheet">
    <link href="<?php echo ROOT_DIRECTORY; ?>public/assets/css/owl.carousel.min.css" rel="stylesheet">
    <link href="<?php echo ROOT_DIRECTORY; ?>public/assets/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo ROOT_DIRECTORY; ?>public/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo ROOT_DIRECTORY; ?>public/assets/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <!-- Spinner End -->

        <!-- Header Start -->
        <div class="container-fluid bg-dark px-0">
            <div class="row gx-0">
                <div class="col-lg-3 bg-dark d-none d-lg-block">
                    <a href="index.php" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                        <h5 class="m-0 text-primary text-uppercase" style="color:#77DD77 !important;">Adorable Cat Hotel</h5>
                    </a>
                </div>
                <div class="col-lg-9">
                    <div class="row gx-0 bg-white d-none d-lg-flex">
                        <div class="col-lg-7 px-5 text-start">
                            <div class="h-100 d-inline-flex align-items-center py-2 me-4">
                                <i class="fa fa-envelope text-primary me-2"></i>
                                <p class="mb-0">adorablecat@gmail.com</p>
                            </div>
                            <div class="h-100 d-inline-flex align-items-center py-2">
                                <i class="fa fa-phone-alt text-primary me-2"></i>
                                <p class="mb-0">+959697925125</p>
                            </div>
                        </div>
                        <div class="col-lg-5 px-5 text-end">
                            <div class="h-100 d-inline-flex align-items-center py-2 me-2">
                                <?php 
                                    if(isset($_SESSION['user']))
                                    {
                                        echo "<i class='fas fa-user text-primary me-2'></i>
                                              <p class='mb-0'><a href='user-profile' class='text-dark'>User Profile</a>
                                              </p>";
                                            
                                    }
                                    else
                                    {
                                        echo "<i class='fas fa-user text-primary me-2'></i>
                                              <p class='mb-0'><a href='signup' class='text-dark'>Sign Up</a>
                                              </p>";
                                    }
                                ?>
                            </div>
                            <div class="h-100 d-inline-flex align-items-center py-2 me-2">
                            <?php 
                                    if(isset($_SESSION['user']))
                                    {
                                        echo "<i class='fas fa-sign-out-alt text-primary me-2'></i>
                                              <p class='mb-0'><a href='logout' class='text-dark'>Log Out</a>
                                              </p>";
                                            
                                    }
                                    else
                                    {
                                        echo "<i class='fas fa-sign-in-alt text-primary me-2'></i>
                                              <p class='mb-0'><a href='login' class='text-dark'>Login</a>
                                              </p>";
                                    }
                            ?>
                            </div>
                            <?php
                                if(isset($_SESSION['user']) && $_SESSION['user']['role'] != 1)
                                {
                                    echo "<div class='h-100 d-inline-flex align-items-center py-2'>
                                            <i class='fas fa-tachometer-alt text-primary me-2'></i>
                                            <p class='mb-0'><a href='admin' class='text-dark'>Dashboard</a></p>
                                          </div>";
                                }
                            ?>
                        </div>
                    </div>
                    <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                        <a href="index.php" class="navbar-brand d-block d-lg-none">
                            <h5 class="m-0 text-primary text-uppercase" style="color:#77DD77 !important;">Adorable Cat Hotel</h5>
                        </a>
                        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav mr-auto py-0">
                                <a href="home" class="nav-item nav-link <?php if($current_page == ''){ echo 'active';}?>">Home</a>
                                <a href="room-list" class="nav-item nav-link <?php if($current_page == 'room-list'){ echo 'active';} ?>">Rooms</a>
                                <a href="contact-us" class="nav-item nav-link <?php if($current_page == 'contact-us'){ echo 'active';} ?>">Contact</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Header End -->