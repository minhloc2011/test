<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo WEBROOT.'/css/full-calendar.css'; ?>">

    <style type="text/css">
        #calendar {
            /* 		float: right; */
            margin: 0 auto;
            background-color: #FFFFFF;
            border-radius: 6px;
            box-shadow: 0 1px 2px #C3C3C3;
            -webkit-box-shadow: 0px 0px 21px 2px rgba(0,0,0,0.18);
            -moz-box-shadow: 0px 0px 21px 2px rgba(0,0,0,0.18);
            box-shadow: 0px 0px 21px 2px rgba(0,0,0,0.18);
        }
    </style>

    <title>TodoList</title>
</head>
<body class="bg-light">
    <div class="container-fluid">
        <div class="py-5 text-center">
            <h2>TodoList App</h2>
        </div>

        <div class="row">
            <div class="col-md-6 order-md-2 mb-4">
                <h4 class="mb-3">Calendar</h4>
                <div id="calendar"></div>
            </div>
            <div class="col-md-6 order-md-1">
                <?php echo $get_content; ?>
            </div>
        </div>
    </div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
<script type="application/javascript" src="<?php echo WEBROOT.'/js/full-calendar.js?v=1.6.4'; ?>"></script>
<script>
    $(document).ready(function() {
        $('.input-daterange input').datepicker({
            format: 'yyyy-mm-dd'
        });


        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        var url = "<?php echo $appURL; ?>";

        /* initialize the calendar
        -----------------------------------------------------------------*/

        $('#calendar').fullCalendar({
            header: {
                left: 'title',
                center: 'agendaDay,agendaWeek,month',
                right: 'prev,next today'
            },
            editable: true,
            firstDay: 1, //  1(Monday) this can be changed to 0(Sunday) for the USA system
            selectable: true,
            defaultView: 'month',
            axisFormat: 'h:mm',
            columnFormat: {
                month: 'ddd',    // Mon
                week: 'ddd d', // Mon 7
                day: 'dddd M/d',  // Monday 9/7
                agendaDay: 'dddd d'
            },
            titleFormat: {
                month: 'MMMM yyyy', // September 2009
                week: "MMMM yyyy", // September 2009
                day: 'MMMM yyyy'                  // Tuesday, Sep 8, 2009
            },
            allDaySlot: false,
            selectHelper: false,
            droppable: false, // this allows things to be dropped onto the calendar !!!url + '/calendar'
            events: function(start, end, callback) {
                $.ajax({
                    url: url + '/calendar',
                    type: 'GET',
                    success: function(doc) {
                        var events = [];
                        if(!!doc){
                            $.map( doc, function( r ) {
                                events.push({
                                    title: r.title,
                                    start: r.start,
                                    end: r.end,
                                });
                            });
                        }
                        callback(events);
                    }
                });
            }
        });


    });
</script>
</body>
</html>