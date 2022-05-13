import { initCalendarActions, initCalendar } from "./calendar";
window.$ = require('jquery');

$(function () {
    try {
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });
        var calendarEl = document.getElementById('calendar-wrapper');
        initCalendar(calendarEl);
        initCalendarActions();
    } catch (error) {
        console.log(error);
    }
});
