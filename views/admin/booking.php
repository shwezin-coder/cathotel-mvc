<?php 
    include_once('../views/components/admin/header.php');
?>
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="title"><a href="index.php">Dashboard</a> | Booking List </h4>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="export" class="btn btn-primary" data-target="#addModal" style="float:right !important;">Export</a>
                                    </div>
                                </div>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped" id="book-list">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Name</th>
                                    	<th>Email</th>
                                        <th>Phone Number</th>
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
                                                    if($Booking->user_id != 0 )
                                                    {
                                                        if(isset($Booking->user))
                                                        {
                                                            foreach ($Booking->user as $User) {
                                                                $name = $User->name;
                                                                $email = $User->email;
                                                                $ph_number = $User->phone_number;
                                                            }
                                                        }
                                                        
                                                      
                                                    }
                                                    else
                                                    {
                                                        $name = $Booking->name;
                                                        $email = $Booking->email;
                                                        $ph_number = $Booking->ph_number;
                                                    }
                                                    foreach($Booking->room as $Room)
                                                    {
                                                        $room_type = $Room->room_type;
                                                    }
                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $name; ?></td>
                                                <td><?php echo $email; ?></td>
                                                <td><?php echo $ph_number; ?></td>
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
<?php 
    include_once('../views/components/admin/footer.php');
?>
<script>
    $(document).ready( function () {
        // datatable
        $('#book-list').DataTable();
    })
</script>