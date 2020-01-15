<div id='calendar'></div>
<script>

    $(document).ready(function(){
        var calendarEl = $("#calendar")[0]
        console.log(calendarEl)
        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: [ 'dayGrid' ],
            defaultView: 'dayGridWeek',
            editable: true
        });

        calendar.render();
    })
</script>