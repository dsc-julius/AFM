<div class="auction-timer auction-timer-wrapper animated hiding" data-animation="fadeIn" data-delay="1200">
    <p class="auction-timer-label">Next Auction Ends In</p>
    <div id="countdown-timer" class="timer">
        <div class="timer-col day">
            <p id="days" class="dt-num">00</p>
            <p class="dt-lbl">Days</p>
        </div>
        <div class="timer-col separator"><p></p></div>
        <div class="timer-col hr">
            <p id="hrs" class="dt-num">00</p>
            <p class="dt-lbl">Hours</p>
        </div>
        <div class="timer-col separator"><p></p></div>
        <div class="timer-col min">
            <p id="mins" class="dt-num">00</p>
            <p class="dt-lbl">Mins</p>
        </div>
        <div class="timer-col sec">
            <p id="secs" class="dt-num">00</p>
        </div>
    </div>

    <a href="<?php echo url(drupal_get_path_alias('node/12')); ?>" class="engage-btn">
        <span class="fa fa-angle-left angle-3"></span>
        <span class="fa fa-angle-left angle-2"></span>
        <span class="fa fa-angle-left angle-1"></span>
        <div>Engage</div>
        <span class="fa fa-angle-right angle-1"></span>
        <span class="fa fa-angle-right angle-2"></span>
        <span class="fa fa-angle-right angle-3"></span>
    </a>
</div>