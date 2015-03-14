Chart.defaults.global.responsive = true;
Chart.defaults.global.animation  = false;

var pi = {
    uptime: new Date(0),

    CPULine: {
        label:                'CPU',
        fillColor:            'rgba(0, 188, 140, 0)',
        strokeColor:          'rgba(0, 188, 140, 1)',
        pointColor:           'rgba(0, 188, 140, 1)',
        pointStrokeColor:     'rgba(0, 188, 140, 1)',
        pointHighlightFill:   'rgba(0, 188, 140, 1)',
        pointHighlightStroke: 'rgba(0, 188, 140, 1)',
        data: []
    },

    GPULine: {
        label:                'GPU',
        fillColor:            'rgba(55, 90, 127, 0)',
        strokeColor:          'rgba(55, 90, 127, 1)',
        pointColor:           'rgba(55, 90, 127, 1)',
        pointStrokeColor:     'rgba(55, 90, 127, 1)',
        pointHighlightFill:   'rgba(55, 90, 127, 1)',
        pointHighlightStroke: 'rgba(55, 90, 127, 1)',
        data: []
    },

    init: function() {
        this.getUptime();
        this.drawTempChart();
        this.drawCPUChart();
    },

    drawTempChart: function() {
        var chart = new Chart($('#chart-temps').get(0).getContext('2d')).Line({
            labels: [''],
            datasets: [this.CPULine, this.GPULine]
        },
        {
            scaleOverride:   true,
            scaleSteps:      6,
            scaleStepWidth:  5,
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

    drawCPUChart: function() {
        var chart = new Chart($('#chart-cpu').get(0).getContext('2d')).Line({
            labels: [''],
            datasets: [this.CPULine]
        },
        {
            scaleOverride:   true,
            scaleSteps:      10,
            scaleStepWidth:  10,
            scaleStartValue: 0
        });

        var i = 0;

        setInterval(function() {
            $.get('run.php?cmd=cpu', function(ret) {
                var cpu = JSON.parse(ret);
                chart.addData([cpu], '');

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

    // Makes the charts look OK on mobile. Not perfect and could do with a
    // better solution
    if (screen.width >= 992 && screen.width <= 1200) {
        $('canvas').attr('height', '150');
    } else if (screen.width >= 1200) {
        $('canvas').attr('height', '100');
    } else {
        $('canvas').attr('height', '250');
    }

    pi.init();
});
