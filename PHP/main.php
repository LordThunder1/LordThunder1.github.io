<?php 
    session_start();
    require_once('mysqli_connect.php');
    if (isset($_SESSION['status'])){
        //For succes and error banners.
        unset($_SESSION['status']);
    }
    include('header.php');
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../fullcalendar-3.8.0/fullcalendar.min.css">
    <link href="../fullcalendar-3.8.0/fullcalendar.print.min.css" rel="stylesheet" media="print">
    <script src="../fullcalendar-3.8.0/lib/moment.min.js"></script>
    <script src="../fullcalendar-3.8.0/lib/jquery.min.js"></script>
    <script src="../fullcalendar-3.8.0/fullcalendar.js"></script>
    <script src="../fullcalendar-3.8.0/locale-all.js"></script>
    <script>
        $(document).ready(function(){
            $('#calendar').fullCalendar({
                header: {
                    center: 'month,agendaWeek,agendaDay'
                },
                allDaySlot: false,
                selectable: false,
                eventLimit: true,
                dayClick: function(date){
                   var vista = $('#calendar').fullCalendar('getView').name;
                   if (vista == 'month'){
                       $('#calendar').fullCalendar('changeView', 'agendaDay');
                       $('#calendar').fullCalendar('gotoDate', date);
                   }
                },
                events: {
                    url: 'get_events.php',
                    type: 'POST',
                    error: function(){
                        alert('There was an error fetching events.');
                    }
                },
                aspectRatio: 2  
           }) 
        });
    </script>
</head>
<body>
    <div class="main_container">
        <?php include('sidebar.php'); ?>
        <div id="calendar" style="width:60vw;margin-right:auto;margin-top:5vh"></div>
    </div>
</body>
</html>