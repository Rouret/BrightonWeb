<div id='calendar' class="all"></div>
<script>
var calendar;
    $(document).ready(function(){
        var calendarEl = $("#calendar")[0]
        console.log(calendarEl)
        var date=new Date();
        var year=date.getFullYear()
        var start_day=year+'-07-30'
        var stop_day=year+'-08-06'
        calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: [ 'dayGrid' ],
            defaultView: 'dayGridWeek',
            editable: true,
            visibleRange: {
                start: start_day,
                end: stop_day
            }
        });
        calendar.render();
    })
</script>