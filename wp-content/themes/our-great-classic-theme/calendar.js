document.addEventListener("DOMContentLoaded", function () {

  const calendarEl = document.getElementById("calendar");
  if (!calendarEl) return;

  const calendar = new FullCalendar.Calendar(calendarEl, {
    locale: 'en',
    initialView: 'dayGridMonth',

    views: {
      listDay: { buttonText: 'Day' },
      listWeek: { buttonText: 'Week' },
      listMonth: { buttonText: 'List' },
      dayGridMonth: { buttonText: 'Calendar' },
    },

    headerToolbar: {
      left: "prev,next today",
      center: "title",
      right: "dayGridMonth listDay,listWeek,listMonth"
    },

    buttonText: {
      today: 'Today'
    },

    aspectRatio: 10,
    height: "auto",

    titleFormat: { year: 'numeric', month: 'short' },
    listDayFormat: { weekday: 'long', month: 'short', day: '2-digit' },
    listDaySideFormat: false,

    // 🔑 GOOGLE CALENDAR
    googleCalendarApiKey: "AIzaSyCleR5hROa8zwK8FmFmFYa2MJ_2w_yTFkk",

    events: {
      googleCalendarId: "itzmeoskar@gmail.com",
      className: "gcal-event"
    },

    eventClick: function (arg) {
      window.open(arg.event.url, '_blank', 'width=700,height=600');
      arg.jsEvent.preventDefault();
    }
  });

  calendar.render();

  // 📱 Responsive view switching
  const mediaQuery = window.matchMedia("(min-width: 768px)");

  function handleViewChange(e) {
    if (e.matches) {
      calendar.changeView('dayGridMonth');
    } else {
      calendar.changeView('listMonth');
    }
  }

  handleViewChange(mediaQuery);
  mediaQuery.addEventListener("change", handleViewChange);
});
