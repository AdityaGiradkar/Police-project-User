google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Quarters', 'Availability per division'],
        ['Total Quarters',     11],
        ['Engaged Quarters',      7],
        ['Available Quarters',  2],
        ['Total Flats', 11],
        ['Available Flats', 2] 
    ]);

    var options = {
          title: 'Quarters Statistics'
        };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    chart.draw(data, options);
}

