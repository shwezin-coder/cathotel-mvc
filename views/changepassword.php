<?php 
    include_once('../views/components/header.php');
?>
<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-1.jpg);">
            <div class="container-fluid page-header-inner py-5">
                <div class="container text-center pb-5">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Change Password</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Change Password</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Page Header End -->

        <!-- Contact Start -->
        <div class="container-xxl py-5" style="margin-bottom:200px !important;">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Change Password</h6>
                    <h1 class="mb-5"><span class="text-primary text-uppercase">Change</span> Your Password</h1>
                </div>
                <div class="row g-4">
                    <div class="col-md-12">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <form action="" method="POST">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Current Password" value="<?php echo $_POST['password'] ?? ''; ?>" required>
                                            <label for="password">Current Password</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="password" class="form-control" name="newpassword" id="newpassword" placeholder="New Password" value="<?php echo $_POST['newpassword'] ?? ''; ?>" required>
                                            <label for="newpassword">New Password</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="password" class="form-control" name="confirmnewpassword" id="confirmnewpassword" placeholder="Confirm New Password" value="<?php echo $_POST['confirmnewpassword'] ?? ''; ?>" required>
                                            <label for="confirmnewpassword">Confirm New Password</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" type="submit" name="btnSubmit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End --> 
<?php 
    include_once('../views/components/footer.php');
?>