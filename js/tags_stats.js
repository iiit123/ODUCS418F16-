/**
 * fetch all the tags in the database and displays as pie chart.
 */

$(document).ready(function () {

    $.get('../actions/get/get_all_tags.php', function(response) {
        var data = [];
        $.each(response, function(key, value){
            data.push({name: key.toUpperCase(), y: value});
        });
        
        $('.tags_stats').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Tags'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    }                
                }
            },
            series: [{
                name: 'value',
                colorByPoint: true,
                data: data
            }]
    });

    },'json');
});
