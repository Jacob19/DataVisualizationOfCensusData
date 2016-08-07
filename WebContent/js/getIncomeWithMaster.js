$('li > a').on('click',function(){
	$(this).parent().addClass('active');
	$(this).parent().siblings().removeClass('active');
})



function loadDoc() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            var data1 = xhttp.responseText;
            var data2 = JSON.parse(data1);
            var labels_all = [];
            var data_all = [];
            var temp = 0;

            $('#census-chart').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'State Government'
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    categories: data2['label'],
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Frequency'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y} Number of People</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                        name: 'master',
                        data: data2['master']

                    },
                    {
                     name: 'Bachelors',
                     data: data2['bachelors']

                     },

                ]
            });
        }
    };
    xhttp.open("POST", "../getIncomewithQualification.php", true);
    xhttp.send();
}



function loadDoc2(obj) {

    sector = document.getElementById(obj.id).innerHTML;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            var data1 = xhttp.responseText;
            var data2 = JSON.parse(data1);
            var labels_all = [];
            var data_all = [];
            var temp = 0;

            $('#census-chart').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: sector
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    categories:  data2['label'],
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Frequency'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y} Number of People</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                        name: 'Masters',
                        data: data2['master']

                    },
                    {
                     name: 'Bachelors',
                     data: data2['bachelors']

                    },

                ]
            });
        }
    };
    xhttp.open("POST", "../getIncomewithQualification.php", true);

    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.send("sector=" + sector);
}