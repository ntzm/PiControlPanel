<?php
include 'pi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Pi Control Centre</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://bootswatch.com/darkly/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>
<body>
    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="/"><i class="fa fa-dashboard"></i> Pi Control Centre</a>
        </div>
      </div>
    </nav>

    <div class="container">
        <div class="col-md-6">
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

        <div class="col-md-6">
            <h2><i class="fa fa-cog"></i> System Operations</h2>
            <div class="btn-group">
                <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-power-off"></i> Shut down <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#" data-toggle="modal" data-target="#modal-shutdown">Shut down</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#modal-reboot">Reboot</a></li>
                </ul>
            </div>
        </div>

        <div class="col-md-12">
            <h2><i class="fa fa-area-chart"></i> Temperature (&deg;C)</h2>
            <span class="label label-primary">GPU</span>
            <span class="label label-success">CPU</span>
            <canvas id="chart-temps" width="500" height="250"></canvas>
        </div>
    </div>

    <div class="modal fade" id="modal-shutdown" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Shut down?</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to shut down the Pi?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger" id="btn-shutdown">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-reboot" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Reboot?</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to reboot the Pi?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger" id="btn-reboot">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
    <script src="app.js"></script>
</body>
</html>
