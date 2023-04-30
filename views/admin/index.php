<?php 
    include_once('../views/components/admin/header.php');
?>
        <div class="content">
            <div class="container-fluid">
            <div class="row">
                    <div class="col-md-4">
                        <div class="card">

                            <div class="header">
                                <h4 class="title">Staffs</h4>
                                <p class="category">Total - <?php echo $count_users; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                    <h4 class="title">Rooms</h4>
                                    <p class="category">Total - <?php echo $rooms_row['totalrooms']; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">

                            <div class="header">
                                <h4 class="title">Income</h4>
                                <p class="category">Total - <?php echo $bookings_row['totalincome']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="card">

                            <div class="header">
                                <h4 class="title">Room Type Statistics</h4>
                            </div>
                            <div class="content">
                                <canvas id="pieChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Bar Chart</h4>
                            </div>
                            <div class="content">
                                <canvas id="barChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php 
    include_once('../views/components/admin/footer.php');
?>