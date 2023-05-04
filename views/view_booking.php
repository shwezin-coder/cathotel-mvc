<?php 
    include_once('../views/components/header.php');
?>
        <!-- Contact Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Booking</h6>
                    <h1 class="mb-5"><span class="text-primary text-uppercase">View</span> Your Booking</h1>
                </div>
                <div class="row g-4">
                    <?php 
                        include_once('../views/components/menu_component.php');
                    ?>
                    <div class="col-md-12" style="margin-bottom:100px !important;">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <div class="content table-responsive table-full-width">
                                    <table class="table table-hover table-striped" id="book-list">
                                        <thead>
                                            <th>ID</th>
                                            <th>Room Type</th>
                                            <th>Date (Check In / Check Out)</th>
                                            <th>No of Rooms</th>
                                            <th>Special Requests</th>
                                            <th>Cat Information</th>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            if(!empty($Bookings))
                                            {
                                                $i = 1;
                                                foreach($Bookings as $Booking) { 
                                                    $cat_informations = json_decode($Booking->cat_information);
                                                    foreach($Booking->room as $Room)
                                                    {
                                                        $room_type = $Room->room_type;
                                                    }
                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $room_type;?></td>
                                                <td> From <?php echo $Booking->check_in. ' To ' .$Booking->check_out ;?></td>
                                                <td><?php echo $Booking->noofrooms; ?></td>
                                                <td><?php echo $Booking->special_request; ?></td>
                                                <td style="width:30%;">
                                                <?php 
                                                    foreach ($cat_informations as $cat_information) {
                                                ?>
                                                    <div class="row" style="margin-top:5px;">
                                                        <?php echo $cat_information->question_text; ?>
                                                    </div>
                                                    <div class="row" style="margin-top:5px;">
                                                        <?php echo $cat_information->answer_text; ?>
                                                    </div>
                                                <?php
                                                    }
                                                ?>
                                                </td>

                                            </tr>
                                        <?php
                                                    $i++;
                                                }                                          
                                                
                                            }
                                        ?>
                                        
                                    </tbody>
                                    </table>

                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->
<?php 
    include_once('../views/components/header.php');
?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script>
        $(document).ready( function () {

            // datatable
            $('#book-list').DataTable();
    });

</script>