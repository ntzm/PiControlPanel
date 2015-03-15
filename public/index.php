<?php
include_once('../pi.php');
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
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="/">
                        <i class="fa fa-dashboard"></i> Pi Control Panel
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="https://github.com/natzim/PiControlPanel" target="_blank">
                                <i class="fa fa-github fa-lg"></i> GitHub
                            </a>
                        </li>
                    </ul>
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
                <dd id="uptime">0 days 0 minutes 0 seconds</dd>
            </dl>
        </div>

        <div class="col-md-12">
            <h2><i class="fa fa-area-chart"></i> Temperature (&deg;C)</h2>
            <span class="label label-primary">GPU</span>
            <span class="label label-success">CPU</span>
            <canvas id="chart-temps" width="500" height="250">
                Sorry, Your browser is a little bit too old to display these charts! Please upgrade to a modern browser.
            </canvas>
        </div>

        <div class="col-md-12">
            <h2><i class="fa fa-area-chart"></i> CPU Usage (%)</h2>
            <canvas id="chart-cpu" width="500" height="250">
                Sorry, Your browser is a little bit too old to display these charts! Please upgrade to a modern browser.
            </canvas>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
    <script src="js/app.js"></script>
</body>
</html>
