/**
 * @author Batch Themes Ltd.
 */
(function() {
    'use strict';
    $(function() {
        if (!element_exists('#apps-calendar')) {
            return false;
        }
        var colors = bootstrap_colors();

        //https://fullcalendar.io/docs/event_data/clientEvents/
        var events = [{
            title: 'All Day Event',
            start: '2017-05-01'
        }, {
            title: 'Long Event',
            start: '2017-05-07',
            end: '2017-05-10'
        }, {
            id: 999,
            title: 'Repeating Event',
            start: '2017-05-09T16:00:00'
        }, {
            id: 998,
            title: 'Repeating Event',
            start: '2017-05-16T16:00:00'
        }, {
            title: 'Meeting',
            start: '2017-05-12T10:30:00',
            end: '2017-05-12T12:30:00'
        }, {
            title: 'Lunch',
            start: '2017-05-12T12:00:00'
        }, {
            title: 'Birthday Party',
            start: '2017-05-13T07:00:00'
        }, {
            title: 'Click for Google',
            url: 'http://google.com/',
            start: '2017-05-28'
        }];
        $('#calendar').fullCalendar({
            dayClick: function(date, jsEvent, view) {
                console.log('Clicked on: ' + date.format());
                console.log('Event: ', jsEvent);
                console.log('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
                console.log('Current view: ' + view.name);
                //$(this).css('background-color', 'red');
            },
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultDate: '2017-05-12',
            defaultView: 'month',
            editable: true,
            events: events
        });
    });
})();
