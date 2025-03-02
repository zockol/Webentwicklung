document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'de',
        initialView: 'dayGridMonth',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        buttonText: {
            today: 'Heute',
            month: 'Monat',
            week: 'Woche',
            day: 'Tag'
        },
        events: 'load_events.php',
        dateClick: function(info) {

            var formattedDate = info.dateStr;


            info.innerHTML = '<strong>Datum:</strong> ' + formattedDate;
            window.alert( info.innerHTML)

        }

    });

    calendar.render();
});