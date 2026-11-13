$(document).ready(function(){

    var calendar = $('#weekly-calendar').fullCalendar({
        header: {
            left: '',
            center: 'title',
            right: ''
        },
        defaultDate: moment().format('YYYY-MM-DD'),
        editable: false,
        selectable: true,
        selectHelper: true,
        defaultView: 'basicDay',
        aspectRatio: 1.5,
        height: 387,
        eventLimit: {
            'month': 4, // adjust to 4 only for months
            'default': false // display all events for other views
        },
        eventLimitText: "View More",
        events:`${param['BASE_URL']}dashboard/getEvents`,
    });
    
   
    //Chart
    
    var startDate = sendAjax(`${param['BASE_URL']}dashboard/startdate`);
    var endtDate = sendAjax(`${param['BASE_URL']}dashboard/enddate`);

     new Chart("chartWork", 
        {
            "type":"bar",
            "data":{"labels":["Jan.","Feb.","Mar.","Apr.","May","June","July","Aug.","Sept.","Oct.","Nov.","Dec."],
            "datasets":[
                {
                            "label":"Start Date",
                            "data":startDate.data,
                            "fill":false,
                            "backgroundColor": "rgba(129, 253, 235, 0.9)",
                            "borderColor": "rgb(38, 221, 187)",
                            "borderWidth":1
                },
                {
                            "label":"End Date",
                            "data":endtDate.data,
                            "fill":false,
                            "backgroundColor": "rgba(9, 202, 240, 0.9)",
                            "borderColor": "rgb(46, 174, 251)",
                            "borderWidth":1
                }
                        ]},
            "options":{
                "plugins": { "legend": { 'backgroun-color': 'red' }, },
                "scales":{"yAxes":[{"ticks":{
                        "beginAtZero":true,
                        "steps": 10,
                        "stepValue": 5,
                        "max": 60
                    }
                }]}
            }
        });

    

});