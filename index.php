<?php
include_once('pi.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Pi Control Panel</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://bootswatch.com/darkly/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="col-md-12">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/">
                        <i class="fa fa-dashboard"></i> Pi Control Panel
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="col-md-12">
            <h2><i class="fa fa-info-circle"></i> System Info</h2>
            <dl>
                <dt>Hostname</dt>
                <dd><?= Pi::getHostname() ?></dd>
                <dt>IP Address</dt>
                <dd><?= Pi::getIPAddress() ?></dd>
                <dt>Uptime</dt>
                <dd id="uptime"></dd>
            </dl>
        </div>

        <div class="col-md-12">
            <h2><i class="fa fa-area-chart"></i> Temperature (&deg;C)</h2>
            <span class="label label-primary">GPU</span>
            <span class="label label-success">CPU</span>
            <canvas id="chart-temps" width="500" height="250"></canvas>
        </div>

        <div class="col-md-12">
            <h2><i class="fa fa-area-chart"></i> CPU Usage (%)</h2>
            <canvas id="chart-cpu" width="500" height="250"></canvas>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
    <script src="app.js"></script>
</body>
</html>
