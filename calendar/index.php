<?php
define('AT_INCLUDE_PATH', '../../include/');
require (AT_INCLUDE_PATH.'vitals.inc.php');
$_custom_css = $_base_path . 'mods/calendar/fullcalendar/fullcalendar.css'; // use a custom stylesheet
require (AT_INCLUDE_PATH.'header.inc.php');
//include("calendar.php");
?>

<script type='text/javascript' src='mods/calendar/jquery/jquery-1.7.1.min.js'></script>
<script type='text/javascript' src='mods/calendar/jquery/jquery-ui-1.8.17.custom.min.js'></script>
<script type='text/javascript' src='mods/calendar/fullcalendar/fullcalendar.js'></script>

<script type='text/javascript'>

    $(document).ready(function () {

        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

        var calendar = $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            selectable: true,
            selectHelper: true,
            select: function (start, end, allDay) {
                var title = prompt('Event Title:');
                //alert(start+" \n "+end);
                if (title) {
                    calendar.fullCalendar('renderEvent',
						{
						    title: title,
						    start: start,
						    end: end,
						    allDay: allDay
						},
						true // make the event "stick"
					);
                }
                calendar.fullCalendar('unselect');
            },
            editable: false,
            events: /*"json-events.php"*/[
				{
				    title: 'All Day Event',
				    start: new Date(y, m, 1)
				},
				{
				    title: 'Long Event',
				    start: new Date(y, m, d - 5),
				    end: new Date(y, m, d - 2)
				},
				{
				    id: 999,
				    title: 'Repeating Event',
				    start: new Date(y, m, d - 3, 16, 0),
				    allDay: false
				},
				{
				    id: 999,
				    title: 'Repeating Event',
				    start: new Date(y, m, d + 4, 16, 0),
				    allDay: false
				},
				{
				    title: 'Meeting',
				    start: new Date(y, m, d, 10, 30),
				    allDay: false
				},
				{
				    title: 'Lunch',
				    start: new Date(y, m, d, 12, 0),
				    end: new Date(y, m, d, 14, 0),
				    allDay: false
				},
				{
				    title: 'Birthday Party',
				    start: new Date(y, m, d + 1, 19, 0),
				    end: new Date(y, m, d + 1, 22, 30),
				    allDay: false
				},
				{
				    title: 'Click for Google',
				    start: new Date(y, m, 28),
				    end: new Date(y, m, 29),
				    url: 'http://google.com/'
				}
			]
        });
        $("td a").click(function (e) {
            e.preventDefault();
            //write code to open event console
        });
    });

</script>
<style type='text/css'>
	#calendar {
		width: 900px;
		margin: 0 auto;
		}

</style>

<div id='calendar'></div>

<?php
require (AT_INCLUDE_PATH.'footer.inc.php'); 
?>
