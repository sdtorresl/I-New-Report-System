var colors  = [
	'#f44336', // Red
	'#e91e63', // Pink
	'#9c27b0', // Purple
	'#673ab7', // Deep Purple
	'#3f51b5', // Indigo
	'#2196f3', // Blue
	'#03a9f4', // LightBlue
	'#00bcd4', // Cyan
	'#009688', // Teal
	'#4caf50', // Green
	'#8bc34a', // Light Green
	'#cddc39', // Lime
	'#ffeb3b', // Yellow
	'#ffc107', // Amber
	'#ff9800', // Orange
	'#ff5722', // Deep Orange
	'#795548', // Brown
	'#9e9e9e', // Grey
	'#607d8b' // Blue Grey
]

var getColorArray = function(size) {
	var notUsedColors = colors;

	var colorsArray = [];
	var current;
	var i = 0;

	while (i < size) {
		current = Math.floor(Math.random() * notUsedColors.length);
		colorsArray[i] = notUsedColors[current];
		
		// Remove used colors, if there is not available, reset
		if (current >= 0) {
			notUsedColors.splice(current, 1);
		} else {
			notUsedColors = colors;
		}

		i++;
	}

	return colorsArray;
}

var getBgArray = function(colors) {
	var background = [];

	for (var i = colors.length - 1; i >= 0; i--) {
		background[i] = convertHex(colors[i], 70);
	}

	return background;
}

var convertHex = function(hex, opacity) {
    hex = hex.replace('#','');
    r = parseInt(hex.substring(0,2), 16);
    g = parseInt(hex.substring(2,4), 16);
    b = parseInt(hex.substring(4,6), 16);

    result = 'rgba('+r+','+g+','+b+','+opacity/100+')';
    return result;
}

porting = {

	loadSummaryChart: function(data) {
		var ctx = $("#chartSummary");

		bgColors = getColorArray(data.length);

		var count = [];
		var operation = [];
		for (var i = 0; i < data.length; i ++) {
		  operation[i] = data[i].operation;
		  count[i] = data[i].count;
		}
		var summaryData = {
		  labels: operation,
		  series: count
		};
		console.log(summaryData);

		var summarChart = new Chart(ctx, {
			type: 'pie',
			data: {
				labels: summaryData.labels,
				datasets: [{
					data: summaryData.series,
					backgroundColor: getBgArray(bgColors),
					borderColor: bgColors,
					borderWidth: 1
				}]
			}
		});
	},

	loadPortOutChart: function(summaryByDonorCarrier) {
		var ctx = $("#chartSummaryByDonorCarrier");

		bgColors = getColorArray(summaryByDonorCarrier.length);

		var count = [];
		var donorcarrier = [];
		for (var i = 0; i < summaryByDonorCarrier.length; i ++) {
			donorcarrier[i] = summaryByDonorCarrier[i].donorcarrier;
			count[i] = summaryByDonorCarrier[i].count;
		}
		var summaryByDonorCarrierData = {
			labels: donorcarrier,
			series: count
		};
		console.log(summaryByDonorCarrier);

		var summaryByDonorChart = new Chart(ctx, {
			type: 'pie',
			data: {
				labels: donorcarrier,
				datasets: [{
					data: count,
					backgroundColor: getBgArray(bgColors),
					borderColor: bgColors,
					borderWidth: 1
				}]
			}
		});
	},

	loadPortInChart: function(summaryByRecipientCarrier) {
		var ctx = $("#chartSummaryByRecipientCarrier");

		bgColors = getColorArray(summaryByRecipientCarrier.length);

		var count = [];
		var recipientcarrier = [];
		for (var i = 0; i < summaryByRecipientCarrier.length; i ++) {
		  recipientcarrier[i] = summaryByRecipientCarrier[i].recipientcarrier;
		  count[i] = summaryByRecipientCarrier[i].count;
		}
		var summaryByRecipientCarrierData = {
		  labels: recipientcarrier,
		  series: count
		};
		console.log(summaryByRecipientCarrier);

		var summaryByRecipientChart = new Chart(ctx, {
			type: 'pie',
			data: {
				labels: recipientcarrier,
				datasets: [{
					data: count,
					backgroundColor: getBgArray(bgColors),
					borderColor: bgColors,
					borderWidth: 1
				}]
			}
		});
	},

	loadPortIngsByDateChart: function(tickets) {
		var ctx = $("#chartPortings");

		bgColors = getColorArray(tickets.length);

		var dates = [];
		var portouts = [];
		var portins = [];
		for (var i = 0; i < tickets.length; i ++) {
			dates[i] = tickets[i].date;
			portouts[i] = tickets[i].portout;
			portins[i] = tickets[i].portin;
		}

		var summaryByRecipientChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: dates,
				datasets: [
					{
						data: portins,
						label: 'Port In',
						backgroundColor: convertHex('#8bc34a', 80),
						borderColor: '#8bc34a',
						borderWidth: 1,
						fill: false,
						lineTension: false
					}, 
					{
						data: portouts,
						label: 'Port Out',
						backgroundColor: convertHex('#f44336', 80),
						borderColor: '#f44336',
						borderWidth: 1,
						fill: false,
						lineTension: false
					}
				]
			}
		});
	},

	initChartist: function(summary, summaryByDonorCarrier, summaryByRecipientCarrier) {

		var count = [];
		var operation = [];
		for (var i = 0; i < summary.length; i ++) {
		  operation[i] = summary[i].operation + ': ' + summary[i].count;
		  count[i] = summary[i].count;
		}
		var summaryData = {
		  labels: operation,
		  series: count
		};

		Chartist.Pie('#chartSummary', summaryData);

		var count = [];
		var donorcarrier = [];
		for (var i = 0; i < summaryByDonorCarrier.length; i ++) {
		  donorcarrier[i] = summaryByDonorCarrier[i].donorcarrier + ': ' + summaryByDonorCarrier[i].count;
		  count[i] = summaryByDonorCarrier[i].count;
		}
		var summaryByDonorCarrierData = {
		  labels: donorcarrier,
		  series: count
		};

		Chartist.Pie('#chartSummaryByDonorCarrier', summaryByDonorCarrierData);

		var count = [];
		var recipientcarrier = [];
		for (var i = 0; i < summaryByRecipientCarrier.length; i ++) {
		  recipientcarrier[i] = summaryByRecipientCarrier[i].recipientcarrier + ': ' + summaryByRecipientCarrier[i].count;
		  count[i] = summaryByRecipientCarrier[i].count;
		}
		var summaryByRecipientCarrierData = {
		  labels: recipientcarrier,
		  series: count
		};

		Chartist.Pie('#chartSummaryByRecipientCarrier', summaryByRecipientCarrierData);
	}
}
