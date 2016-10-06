
$(document).ready(function () {

    $.get('../actions/get/get_questions_ans_count.php', function(response) {
        var categories = [];
        var questions_count = [];
        var answers_count = [];
        $.each(response, function(key, value) {
            categories.push(key);
            questions_count.push(parseInt(value['questions_count']));
            answers_count.push(parseInt(value['answers_count']));
        });
        
         $('.ques_ans_stats').highcharts({
            chart: {
                type: 'line'
            },
            title: {
                text: 'Questions vs Answers'
            },
            xAxis: {
                categories: categories
            },
            yAxis: {
                title: {
                    text: 'Count'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                name: 'Questions',
                data: questions_count
            }, {
                name: 'Answers',
                data: answers_count
            }]
        
        });

    },'json');
});
