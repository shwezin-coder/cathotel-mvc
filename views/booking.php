<?php 
    include_once('../views/components/header.php');
    $target_dir = ROOT_DIRECTORY ."public/storage/featureimages/";
?>
 <!-- Booking Start -->
  <div class="container-xxl py-5" style="margin-bottom:200px !important;">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title text-center text-primary text-uppercase">Room Booking</h6>
            <h1 class="mb-5">Book A <span class="text-primary text-uppercase">Luxury Room</span></h1>
        </div>
        <div class="row g-5">
            <div class="col-lg-6">
                <div class="row g-3">
                    <?php 
                        if(!empty($FeatureImages))
                        {
                            $i = 1;
                            foreach($FeatureImages as $key => $value)
                            {
                                if($i%2 == 0)
                                {
                                    $text_area = "text-start";
                                }
                                else
                                {
                                    $text_area = "text-end";
                                }
                        ?>
                                <div class="col-6 <?php echo $text_area; ?>">
                                    <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s" src="<?php echo $target_dir. $value->image; ?>" style="margin-top: 25%;">
                                </div>
                            <?php 
                                $i++;
                            }
                        }
                      
                        ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                    <form action="booking?id=<?php echo $_GET['id']; ?>" method="POST">
                        <div class="row g-3">
                            <?php 
                                if(!isset($_SESSION['user']))
                                {
                            ?>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" value="<?php $_POST['name'] ?? ''; ?>">
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" value="<?php echo $_POST['email'] ?? ''; ?>">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="ph_number" id="ph_number" placeholder="Your Phone Number" value="<?php echo $_POST['ph_number'] ?? ''; ?>">
                                    <label for="ph_number">Phone Number</label>
                                </div>
                            </div>
                            <?php
                                }
                                else
                                {
                            ?>
                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['user_id']; ?>">
                            <?php
                                }
                            ?>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" name="check_in" min="<?php echo date('Y-m-d'); ?>" class="form-control datetimepicker-input" value="<?php echo $_POST['check_in'] ?? ''; ?>" id="checkin" placeholder="Check In" />
                                    <label for="checkin">Check In</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" name="check_out" min="<?php echo date('Y-m-d'); ?>" class="form-control" id="checkout" value="<?php echo $_POST['check_out'] ?? ''; ?>" placeholder="Check Out" />
                                    <label for="checkout">Check Out</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="number" name="noofrooms" class="form-control" id="noofrooms" value="<?php echo $_POST['noofrooms'] ?? ''; ?>" placeholder="No of Rooms" />
                                    <label for="checkout">No of Rooms</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" name="special_request" placeholder="Special Request" id="message" value="<?php echo $_POST['special_request'] ?? ''; ?>" style="height: 100px"></textarea>
                                    <label for="message">Special Request</label>
                                </div>
                            </div>
                            <!-- Cat Questions -->
                            <h5>Cat Information</h5>
                            <?php 
                                if(!empty($CatQuestions))
                                {
                                $j = 1;
                                foreach ($CatQuestions as $key => $value){

                                    $question_type = $value->question_type;
                                    $question_text = $value->question_text;
                                    $option_values_arr = explode(",",$value->option_values);
                                    if($question_type == 'textbox')
                                    {
                            ?>
                                        <div class="col-md-12">
                                            <input type="hidden" name="cat_information[<?php echo $j; ?>][question_text]" value="<?php echo $question_text; ?>">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" name="cat_information[<?php echo $j; ?>][answer_text]" id="<?php echo $question_text; ?>" placeholder="<?php echo $question_text; ?>" required>
                                                <label for="<?php echo $question_text; ?>"><?php echo $question_text; ?></label>
                                            </div>
                                        </div>
                            <?php
                                    }
                                    elseif($question_type == 'selectbox')
                                    {    
                            ?>
                                        <div class="col-md-12">
                                            <input type="hidden" name="cat_information[<?php echo $j; ?>][question_text]" value="<?php echo $question_text; ?>">
                                            <div class="form-floating">
                                            <select name="cat_information[<?php echo $j; ?>][answer_text]" id="<?php echo $question_text; ?>" class="form-control" required>
                                        <?php
                                            for ($i=0; $i < count($option_values_arr); $i++) {  
                                        ?>
                                                <option value="<?php echo $option_values_arr[$i]; ?>"><?php echo $option_values_arr[$i]; ?></option>

                                        <?php
                                            }
                                        ?>
                                            </select>
                                            <label for="<?php echo $question_text; ?>"><?php echo $question_text; ?></label>
                                            </div>
                                        </div>
                                    <?php
                                        }
                                        else
                                        {
                                    ?>
                                        <div class="col-md-12">
                                            <input type="hidden" name="cat_information[<?php echo $j; ?>][question_text]" value="<?php echo $question_text; ?>">
                                            <label><?php echo $question_text; ?></label><br />
                                                <?php 
                                                    for ($i=0; $i < count($option_values_arr); $i++) { 
                                                ?>
                                                    <input type="radio" name="cat_information[<?php echo $j; ?>][answer_text]" id="<?php echo $option_values_arr[$i]; ?>" value="<?php echo $option_values_arr[$i]; ?>">
                                                    <label for="<?php echo $option_values_arr[$i]; ?>"><?php echo $option_values_arr[$i]; ?></label>
                                                <?php
                                                    }
                                                ?>
                                        </div>
                                    <?php
                                            }
                                            $j++;
                                        }
                                                                        
                                }
                                    ?>
                                    <!--- Cat Question End--->
                                    <input type="hidden" name="room_id" value="<?php echo $_GET['id']; ?>">
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" name="btnBook" type="submit">Book Now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Booking End -->
<?php 
    include_once('../views/components/footer.php');
?>