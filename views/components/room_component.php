<!-- Room Start -->
<div class="container-xxl py-5" style="margin-bottom:200px !important;">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title text-center text-primary text-uppercase">Our Rooms</h6>
            <h1 class="mb-5">Explore Our <span class="text-primary text-uppercase">Rooms</span></h1>
        </div>
        <div class="row g-4">
            <?php 
                if(!empty($Rooms))
                {
                    foreach ($Rooms as $key => $value) {                        
            ?>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="room-item shadow rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="<?php echo $target_dir.$value->image; ?>" alt="" style="width:408px !important; height:244px !important;">
                                <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">$ <?php echo $value->price; ?>/Night</small>
                            </div>
                            <div class="p-4 mt-2">
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="mb-0"><?php echo $value->room_type;?></h5>
                                </div>
                                <p class="text-body mb-3"><?php echo $value->specification; ?></p>
                                <div class="d-flex justify-content-between">
                                    <a class="btn btn-sm btn-dark rounded py-2 px-4" href="booking?id=<?php echo $value->id; ?>">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }
                    }
                    else
                    {
                        echo "<p class='text-center'> Not Found ! </p>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- Room End -->