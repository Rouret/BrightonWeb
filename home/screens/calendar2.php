
<div class="all">
    <!-- <div class="all-w h-10 center">
        <h1 class="UniqueRegular">Calendar</h1>
    </div> -->
    <div class="all">
        <div id="scheduler_here" class="dhx_cal_container" style='width:100%; height:100%;'>
        <div class="dhx_cal_navline">
            <div class="dhx_cal_date"></div>
        </div>
        <div class="dhx_cal_header"></div>
        <div class="dhx_cal_data"></div>       
    </div>
    </div>
<div>

<script>
    var events = [
    {id:1, text:"Meeting",   start_date:"04/11/2018 14:00",end_date:"04/11/2018 17:00"},
    {id:2, text:"Conference",start_date:"04/15/2018 12:00",end_date:"04/18/2018 19:00"},
    {id:3, text:"Interview", start_date:"04/24/2018 09:00",end_date:"04/24/2018 10:00"}
    ];
    var date=new Date();
    var year=date.getFullYear()
    let start_date=new Date(year,7,30)

    // WEEK
    scheduler.config.first_hour = 6;
    scheduler.config.last_hour = 20;
    scheduler.config.start_on_monday = false;
    scheduler.config.limit_start = start_date;
    scheduler.config.limit_end = new Date(year,8,6);
    scheduler.config.limit_view  = true;

    scheduler.init('scheduler_here', start_date,"week");

    var dp = new dataProcessor("data/api.php");
    dp.init(scheduler);
    dp.setTransactionMode("JSON"); // use to transfer data with JSON

    $("#test").click(function(){
        dhx.storage.local
    })
</script>