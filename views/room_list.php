<?php 
    include_once('../views/components/header.php');
    $target_dir = ROOT_DIRECTORY ."public/storage/rooms/";
?>
<!-- Booking Start -->
<div class="container-fluid booking pb-5 wow fadeIn" data-wow-delay="0.1s" style="margin-top:50px !important;">
    <div class="container">
        <form action="room-list" method="POST">
            <div class="bg-white shadow" style="padding: 35px;">
                <div class="row g-2">
                    <div class="col-md-10">
                        <div class="row g-2">
                            <div class="col-md-6">
                                <select class="form-select" name="room_type" required>
                                    <option value="">Select Room Type</option>
                                    <?php 
                                        foreach ($RoomTypes as $key => $value) {
                                    ?>
                                            <option value="<?php echo $value->id; ?>"><?php echo $value->room_type; ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select class="form-select" name="price_range" required>
                                    <option value="">Select Price Range</option>
                                    <option value="10-100">$10  - $100</option>
                                    <option value="100-200">$100 - $200</option>
                                    <option value="200-300">$200 - $300</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" name="btnSearch" class="btn btn-primary w-100">Search</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Booking End -->

<?php 
    include_once('../views/components/room_component.php');
    include_once('../views/components/footer.php');
?>