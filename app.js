var pi = {
    uptime: new Date(0),

    init: function() {
        this.getUptime();
        this.drawTempChart();
    },

    drawTempChart: function() {
        var chart = new Chart($('#chart-temps').get(0).getContext('2d')).Line({
            labels: [''],
            datasets: [
                {
                    label: 'CPU',
                    fillColor: 'rgba(0, 188, 140, 0)',
                    strokeColor: 'rgba(0, 188, 140, 1)',
                    pointColor: 'rgba(0, 188, 140, 1)',
                    pointStrokeColor: 'rgba(0, 188, 140, 1)',
                    pointHighlightFill: 'rgba(0, 188, 140, 1)',
                    pointHighlightStroke: 'rgba(0, 188, 140, 1)',
                    data: []
                },
                {
                    label: 'GPU',
                    fillColor: 'rgba(55, 90, 127, 0)',
                    strokeColor: 'rgba(55, 90, 127, 1)',
                    pointColor: 'rgba(55, 90, 127, 1)',
                    pointStrokeColor: 'rgba(55, 90, 127, 1)',
                    pointHighlightFill: 'rgba(55, 90, 127, 1)',
                    pointHighlightStroke: 'rgba(55, 90, 127, 1)',
                    data: []
                }
            ]
        },
        {
            responsive: true,
            animationSteps: 10,
            scaleOverride: true,
            scaleSteps: 6,
            scaleStepWidth: 5,
            scaleStartValue: 20
        });

        var i = 0;

        setInterval(function() {
            $.get('run.php?cmd=temps', function(ret) {
                var temps = JSON.parse(ret);
                chart.addData([temps.cpu, temps.gpu], '');

                i++;

                if (i > 25) {
                    chart.removeData();
                }
            });
        }, 2000);
    },

    getUptime: function() {
        $.get('run.php?cmd=uptime', function(uptimeSeconds) {
            pi.uptime.setSeconds(JSON.parse(uptimeSeconds));
            pi.updateUptime();
        });
    },

    shutdown: function() {
        $.get('run.php?cmd=shutdown');
    },

    reboot: function() {
        $.get('run.php?cmd=reboot');
    },

    updateUptime: function() {
        $('#uptime').html(
            this.uptime.getHours() + ' hours ' +
            this.uptime.getMinutes() + ' minutes ' +
            this.uptime.getSeconds() + ' seconds'
        );

        this.uptime.setSeconds(this.uptime.getSeconds() + 1);

        setTimeout(function() {
            pi.updateUptime();
        }, 1000);
    }
};

$(document).ready(function() {
    if (screen.width >= 992 && screen.width <= 1200) {
        $('canvas').attr('height', '150');
    } else if (screen.width >= 1200) {
        $('canvas').attr('height', '100');
    } else {
        $('canvas').attr('height', '250');
    }

    pi.init();
});

$('#btn-shutdown').click(function() {
    pi.shutdown();
});

$('#btn-reboot').click(function() {
    pi.reboot();
});
