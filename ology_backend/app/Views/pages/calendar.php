<!DOCTYPE php>

<style>/* Style the calendar container */
    #calendar {
      max-width: 800px;
      margin: 0 auto;
    }
    
    /* Style the events in the calendar */
    .fc-event {
      padding: 5px 10px;
      background-color: #007BFF;
      border-color: #007BFF;
      color: #fff;
      cursor: pointer;
    }
    
    /* Style the selected date range for creating new events */
    .fc-highlight {
      background-color: rgba(0, 123, 255, 0.3);
    }
    
    /* Style the buttons for next and previous months */
    .fc-prev-button, .fc-next-button {
      background-color: #007BFF;
      color: #fff;
      border: none;
      padding: 10px 15px;
      cursor: pointer;
    }
    
    /* Style the today button */
    .fc-today-button {
      background-color: #007BFF;
      color: #fff;
      border: none;
      padding: 10px 15px;
      cursor: pointer;
    }
    
    /* Style the date header */
    .fc-daygrid-day {
      background-color: #f8f9fa;
      border: 1px solid #ced4da;
      font-weight: bold;
    }
    
    /* Style the event tooltip on hover */
    .fc-event-title:hover {
      text-decoration: underline;
    }

    </style>
<body>
  <div id="calendar"></div>
 
  <script>
//     document.addEventListener('DOMContentLoaded', function() {
//   var calendarEl = document.getElementById('calendar');
//   var calendar = new FullCalendar.Calendar(calendarEl, {
//     initialView: 'dayGridMonth', // You can change the initial view
//     editable: true, // Allow event dragging and resizing
//     selectable: true, // Allow selecting dates to create new events
//     headerToolbar: {
//     left: 'prev,next today',
//     center: 'title',
//     right: 'dayGridMonth,timeGridWeek,timeGridDay'
//   },
//     events: [
//       {
//         title: 'Meeting 1',
//         start: '2023-10-18T10:00:00',
//         end: '2023-10-18T12:00:00',
//         backgroundColor: '#007BFF',
//         borderColor: '#007BFF',
//       },
//       {
//         title: 'Meeting 2',
//         start: '2023-10-20T14:00:00',
//         end: '2023-10-20T16:00:00',
//         backgroundColor: '#28A745',
//         borderColor: '#28A745',
//       },
//     ],
//     customButtons: {
//       btnWeek: {
//         text: 'Week',
//         click: function() {
//           calendar.changeView('timeGridWeek');
//         }
//       },
//     },

//     // Add event for the "Day" button
//     eventClick: function(info) {
//       if (confirm('Delete this event?')) {
//         info.event.remove();
//       }
//     },

//     select: function(info) {
//       // Handle date selection (create new event)
//       var title = prompt('Event Title:');
//       if (title) {
//         calendar.addEvent({
//           title: title,
//           start: info.startStr,
//           end: info.endStr,
//           allDay: info.allDay,
//         });
//       }
//       calendar.unselect();
//     },
//   });

//   calendar.render();

// });

// axios.get('https://ologygirls.in:3000/get-all-events')
//                         .then(response => {
//                             console.log(response.data);
//                         })
//                         .catch(error => {
//                             console.error(error);
//                         });
  document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    editable: true,
    selectable: true,
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay'
    },
    customButtons: {
      btnWeek: {
        text: 'Week',
        click: function() {
          calendar.changeView('timeGridWeek');
        }
      },
    },
    eventClick: function(info) {
      if (confirm('Delete this event?')) {
        info.event.remove();
      }
    },
    select: function(info) {
      var title = prompt('Event Title:');
      if (title) {
        calendar.addEvent({
          title: title,
          start: info.startStr,
          end: info.endStr,
          allDay: info.allDay,
        });
      }
      calendar.unselect();
    },
  });

  // Fetch events from the API using Axios
  axios.get('https://ologygirls.in:3000/get-all-events')
    .then(response => {
      // Process the API response data and add events to the calendar
      var events = response.data;
      console.log("eventsevents",events);
      events.forEach(event => {
        calendar.addEvent({
          title: event.information,
          start: event.datetime,
          end: event.datetime,
          backgroundColor: "007BFF",
          borderColor: "007BFF",
        });
      });
      calendar.render();
    })
    .catch(error => {
      console.error(error);
    });
});


  </script>
</body>
</php>
