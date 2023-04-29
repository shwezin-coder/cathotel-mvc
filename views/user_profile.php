<?php 
    include_once('../views/components/header.php');
?>
  <!-- Contact Start -->
  <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">User Profile</h6>
                    <h1 class="mb-5"><span class="text-primary text-uppercase">Update</span> Your Profile Data</h1>
                </div>
                <div class="row g-4">
                    <div class="col-12">
                        <div class="row gy-4">
                            <div class="col-md-4">
                                <p><a href="change-password"><i class="fa fa-envelope-open text-primary me-2"></i><span class="text-dark">Change Password</span></a></p>
                            </div>
                            <div class="col-md-4">
                                <p><a href="view-booking.php"><i class="fa fa-envelope-open text-primary me-2"></i><span class="text-dark">View Booking</span></a></p>
                            </div>
                            <div class="col-md-4">
                                <p><a href="logout.php"><i class="fa fa-envelope-open text-primary me-2"></i><span class="text-dark">Log Out</span></a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" style="margin-bottom:100px !important;">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                        <form action="" method="POST">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $_POST['name'] ?? $User->name; ?>" required>
                                            <label for="name">Your Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $_POST['email'] ?? $User->email; ?>" readonly>
                                            <label for="email">Your Email</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?php echo $_POST['phone_number'] ?? $User->phone_number; ?>" required>
                                            <label for="phone_number">Phone Number</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" name="btnUpdate" type="submit">Update Profile</button>
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