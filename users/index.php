<?php include './header.php'; ?>

<style>
    #iframescroll {
    overflow: hidden;
}

</style>


<div class="container">
    <div class="row">
        <div class="col-md-6">
        </div>
    </div>
</div>

<div class="row " id="iframescroll">
    <div class="col-sm-12 ">
    <iframe src="./scheduler-app/index.php" frameborder="0" width="100%" height="600px" style="border: none; overflow: hidden;" scrolling="no"></iframe>


    </div>
</div>

<!-- Timer Example -->
<!-- <div id="clockdiv" class="text-center mt-5">
    <h2>Time Remaining</h2>
    <div style="font-size: 24px;"></div>
</div> -->

</div>
<!-- Main Content end-->
</div>

<script>
    // 10 minutes from now
    var time_in_minutes = 10;
    var current_time = Date.parse(new Date());
    var deadline = new Date(current_time + time_in_minutes * 60 * 1000);

    function time_remaining(endtime) {
        var t = Date.parse(endtime) - Date.parse(new Date());
        var seconds = Math.floor((t / 1000) % 60);
        var minutes = Math.floor((t / 1000 / 60) % 60);
        var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
        var days = Math.floor(t / (1000 * 60 * 60 * 24));
        return {
            'total': t,
            'days': days,
            'hours': hours,
            'minutes': minutes,
            'seconds': seconds
        };
    }

    function run_clock(id, endtime) {
        var clock = document.getElementById(id);

        function update_clock() {
            var t = time_remaining(endtime);
            clock.innerHTML = t.minutes + 'm ' + t.seconds + 's';
            if (t.total <= 0) {
                clearInterval(timeinterval);
            }
            alertCountdown(t.minutes, t.seconds);

        }
        update_clock(); // run function once at first to avoid delay
        var timeinterval = setInterval(update_clock, 1000);

    }
    run_clock('clockdiv', deadline);

    function alertCountdown(timerMinutes, timerSeconds) {
        if (timerMinutes === 0 && timerSeconds === 0) {
            alert('Timer Expired');
            window.location.replace("logout.php");
            document.getElementById("okay").disabled = true;
        }
    }
</script>




index
<?php include './footer.php'; ?>