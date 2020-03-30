window.onload = function() {
	var data = [];
	var labels = [];
	var total = 0;
	
	Object.keys(window.incidents).forEach(function(key) {
		labels.push(key);
		var totalMins = 1440;
		var allocatedMins = 1440;
		var temp = window.incidents[key];
		temp.forEach(function(obj) {
			var mins = moment.duration(moment(obj.updated_at).diff(moment(obj.occurred_at))).asMinutes();
			allocatedMins -= mins;
		});
		var pct = parseFloat(allocatedMins / totalMins * 100).toFixed(2);
		data.push(pct);

		total += parseFloat(pct);
	});

	document.getElementById('uptime-heading').innerText = 'Uptime (' + (Math.floor((total/data.length) * 100) / 100) + '%)';

	labels = labels.reverse();
	data = data.reverse();

	var ctx = document.getElementById('uptime-chart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: '',
            data: data,
            backgroundColor: 'rgba(88,90,255,0.4)',
            borderColor: '#585aff',
            borderWidth: 1,
            fill: 'start'
        }]
    },
    options: {
	tooltip: {
		enabled: false
	},
	legend: {
		display: false
	},
	elements: {
                line: {
                        tension: 0.4
                }
        },
	layout: {
		padding: 10
	},
        scales: {
	    xAxes: [{
		    gridLines: {
			    display: false
		    },
		ticks: {
		    display: false
		}
	    }],
            yAxes: [{
		    gridLines: {
			    display: false
		    },
                ticks: {
                    beginAtZero: true,
		    stepSize: 25
                }
            }]
        }
    }
});
};
