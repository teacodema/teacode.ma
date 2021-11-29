import { Calendar } from '@fullcalendar/core';
import interactionPlugin from '@fullcalendar/interaction';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import listPlugin from '@fullcalendar/list';
import 'bootstrap';

function drawBrandText() {
    let text = `
     /$$                                                   /$$
    | $$                                                  | $$
   /$$$$$$    /$$$$$$   /$$$$$$   /$$$$$$$  /$$$$$$   /$$$$$$$  /$$$$$$
  |_  $$_/   /$$__  $$ |____  $$ /$$_____/ /$$__  $$ /$$__  $$ /$$__  $$
    | $$    | $$$$$$$$  /$$$$$$$| $$      | $$  \\ $$| $$  | $$| $$$$$$$$
    | $$ /$$| $$_____/ /$$__  $$| $$      | $$  | $$| $$  | $$| $$_____/
    |  $$$$/|  $$$$$$$|  $$$$$$$|  $$$$$$$|  $$$$$$/|  $$$$$$$|  $$$$$$$
     \\___/   \\_______/ \\_______/ \\_______/ \\______/  \\_______/ \\_______/
    `;
    console.log(text);
}

function initCalendar() {
    var calendarEl = document.getElementById('calendar-wrapper');
    if (calendarEl) {
        var calendar = new Calendar(calendarEl, {
            plugins: [interactionPlugin, dayGridPlugin, timeGridPlugin, listPlugin],
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,listMonth'
            },
            titleFormat: { year: 'numeric', month: '2-digit'},
            themeSystem: 'standard',
            initialDate:  new Date().toISOString(),
            nowIndicator: true,
            navLinks: true,
            allDaySlot: false,
            weekNumbers: true,
            weekNumberFormat: { week: 'numeric' },
            initialView: 'timeGridWeek',
            selectable: false,
            dayMaxEvents: true,
            events: '/api/events',
            eventClick: function(info) {
                info.jsEvent.preventDefault();
                let event = info.event
                $('#event-detail .modal-body').empty();
                let date = event.start.toLocaleString([], {day: 'numeric', weekday: 'short', year: 'numeric', month: 'short', hour: '2-digit', minute: '2-digit'});
                let url = event.url.length <= 50 ?  event.url : event.url.substring(0, 50) + '...';
                let dom = `<div class="event-info event-title">
                                <div class="event-icon"><i class="fas fa-dot-circle"></i></div>
                                <div class="event-text"><span>${event.title}</span></div>
                            </div>
                            <div class="event-info event-date">
                                <div class="event-icon"><i class="fas fa-calendar-alt"></i></div>
                                <div class="event-text"><span>${date}</span></div>
                            </div>
                            <div class="event-info event-url">
                                <div class="event-icon"><i class="fas fa-link"></i></div>
                                <div class="event-text"><span><a href="${event.url}" target="_blank">${url}</a></span></div>
                            </div>`;
                if (event.extendedProps.video) {
                    dom += `<div class="event-info event-video">
                                <div class="event-icon"><i class="fab fa-youtube"></i></div>
                                <div class="event-text"><span><a href="${event.extendedProps.video}" target="_blank">Watch the record</a></span></div>
                            </div>`;
                }
                if (event.extendedProps?.description) {
                    dom += `<div class="event-info event-description">
                                <div class="event-icon"><i class="far fa-file-alt"></i></div>
                                <div class="event-text"><span>${event.extendedProps.description.replaceAll('\\n', '<br/>').replaceAll('\n', '<br/>')}</span></div>
                            </div>`;
                }
                $('#event-detail .modal-body').append(dom);
                $('#event-detail').addClass('d-block show in animate__fadeIn').removeClass('animate__fadeOut');
            },
        });
        calendar.render()
        // calendar.setOption('height', '100%');

        $('#event-detail .close').on('click', function (e) {
            // console.log('child', e.currentTarget, e.target);
            $('#event-detail').addClass('animate__fadeOut').removeClass('animate__fadeIn');
            setTimeout(() => {
                $('#event-detail').removeClass('d-block show in');
            }, 300);
        });

        $('#event-detail').on('click', function (e) {
            if (e.currentTarget == e.target || $(e.target)[0] == $('.close i')[0]) {
                $('#event-detail').addClass('animate__fadeOut').removeClass('animate__fadeIn');
                setTimeout(() => {
                    $('#event-detail').removeClass('d-block show in');
                }, 300);
            }
        });
    }
}

function initParticlesJS() {
    if ($('#particles-js').length) {
        // setTimeout(() => {
        //     $('.loader-wrapper').addClass('disappear');
        // }, 500);
        particlesJS.load('particles-js', '/plugins/particles/particles.min.json');
    }
}


export { drawBrandText, initParticlesJS, initCalendar }
