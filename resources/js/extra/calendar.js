import { Calendar } from '@fullcalendar/core';
import interactionPlugin from '@fullcalendar/interaction';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import listPlugin from '@fullcalendar/list';


function initCalendarActions() {
    $('.event').on('click', '.add-extended_props', function (){
        let index = $('.extended_props_row').length;
        let dom = `<div class="row extended_props_row">
                        <div class="col-5"><input type="text" class="form-control" name="extended_props[${index}][]" placeholder="Field name"/></div>
                        <div class="col-6"><input type="text" class="form-control" name="extended_props[${index}][]" placeholder="Field value"/></div>
                        <div class="col-1 remove-extended_props"><i class="fa-solid fa-minus-circle"></i></div>
                    </div>`;
        $('.extended_props_wrapper').append(dom);
    });
    $('.event').on('click', '.remove-extended_props', function (){
        $(this).parent('.extended_props_row').remove();
    });
    $('.event').on('click', '.update-event', function (e) {
        let data = $('.event form').serializeArray();
        $.ajax({
            method: 'PUT',
            url: '/admin/events/' + $(this).data('id'),
            data: data,
            success: function (response) {
                console.log(response);
                alert('Updated');
            },
            error: function (jqXHR, textStatus, errorThrown){
                console.log(jqXHR, textStatus, errorThrown);
                alert('Error');
            }
        });
    });
    $('.event').on('click', '.delete-event', function (e) {
        // e.preventDefault();
        $.ajax({
            method: 'DELETE',
            url: '/admin/events/' + $(this).data('id'),
            success: function (response) {
                console.log(response);
                alert('Deleted');
                history.back();
            },
            error: function (jqXHR, textStatus, errorThrown){
                console.log(jqXHR, textStatus, errorThrown);
                alert('Error');
            }
        });
    });
}

function initCalendar(calendarEl) {
    if (calendarEl) {
        var calendar = new Calendar(calendarEl, {
            plugins: [interactionPlugin, dayGridPlugin, timeGridPlugin, listPlugin],
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,listMonth'
            },
            // slotMinTime: '12:00',
            // slotMaxTime: '23:59',
            firstDay: 1,
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
                                <div class="event-icon"><i class="fa-solid fa-dot-circle"></i></div>
                                <div class="event-text"><span>${event.title}</span></div>
                            </div>
                            <div class="event-info event-date">
                                <div class="event-icon"><i class="fa-solid fa-calendar-day"></i></div>
                                <div class="event-text"><span>${date}</span></div>
                            </div>
                            <div class="event-info event-url">
                                <div class="event-icon"><i class="fa-solid fa-link"></i></div>
                                <div class="event-text"><span><a href="${event.url}" target="_blank">${url}</a></span></div>
                            </div>`;
                if (event.extendedProps.video) {
                    dom += `<div class="event-info event-video">
                                <div class="event-icon"><i class="fa-brands fa-youtube"></i></div>
                                <div class="event-text"><span><a href="${event.extendedProps.video}" target="_blank">Watch the record</a></span></div>
                            </div>`;
                }
                if (event.extendedProps?.description) {
                    dom += `<div class="event-info event-description">
                                <div class="event-icon"><i class="fa-solid fa-file-lines"></i></div>
                                <div class="event-text"><span>${event.extendedProps.description.replaceAll('\\n', '<br/>').replaceAll('\n', '<br/>')}</span></div>
                            </div>`;
                }
                $('#event-detail .modal-body').append(dom);
                $('#event-detail').addClass('d-block show in animate__fadeIn').removeClass('animate__fadeOut');
            },
        });
        calendar.render();
        calendar.scrollToTime('18:00:00');
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

export { initCalendarActions, initCalendar }
