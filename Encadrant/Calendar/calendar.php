<div class="container pt-4" >
    <div class="wrapper">
        <div class="calendar">
            <div class="month" style="width:100%;">
                <div class="prev" onclick="moveDate('prev')">
                    <span>&#10094;</span>
                </div>
                <h2 id="month"></h2>
                <p id="date_str"></p>
                <div class="next" onclick="moveDate('next')">
                    <span>&#10095;</span>
                </div>
            </div>
            <div class="weekdays">
                <div>Sun</div>
                <div>Mon</div>
                <div>Tue</div>
                <div>Wed</div>
                <div>Thu</div>
                <div>Fri</div>
                <div>Sat</div>
            </div>
            <div class="days"></div>
        </div>
    </div>
</div>
