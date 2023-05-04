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
                                <p class="category">Total - <?php echo $totalusers; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                    <h4 class="title">Rooms</h4>
                                    <p class="category">Total - <?php echo $totalrooms; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">

                            <div class="header">
                                <h4 class="title">Income</h4>
                                <p class="category">Total - <?php echo $totalincome; ?></p>
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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('pieChart');
  const ctx1 = document.getElementById('barChart');
  new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: <?php echo json_encode($roomtype_arr[0]); ?>,
      datasets: [{
        label: 'Room Type',
        data: <?php echo json_encode($roomtype_arr[1]); ?>,
        borderWidth: 1
      }]
    }
  });
  new Chart(ctx1, {
    type: 'bar',
    data: {
      labels:<?php echo json_encode($booking_arr[0]); ?>,
      datasets: [{
        label: 'Monthly Report',
        data: <?php echo json_encode($booking_arr[1]); ?>,
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>