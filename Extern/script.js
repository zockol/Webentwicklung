// Function to fetch data from the API
function fetchData() {
    return fetch("http://localhost:3001/read_api.php") // Ensure this URL is correct
        .then(async (response) => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            const data = await response.json();

            // Map the received data to the FullCalendar event format
            return data.map((event, index) => ({
                id: event.id, // Create a unique ID based on the index
                title: event.Bezeichnung || "No Title", // Use the Bezeichnung field for the title
                start: event.Startzeit, // Start time of the event
                end: event.Endzeit, // End time of the event
                color: 'blue', // Optional: Set default color
                textColor: 'white', // Optional: Set default text color
                description: event.description || '', // Optional: Use additional data if available
            }));
        })
        .catch((error) => {
            console.error("Error fetching data:", error);
            alert("Error fetching events.");
            return []; // Return an empty array in case of error
        });
}

// Function to initialize FullCalendar
function initializeCalendar(events) {
    $('#calendar').fullCalendar({
        selectable: true,
        selectHelper: true,
        select: function () {
            $('#myModal').modal('toggle');
        },
        header: {
            left: 'month,agendaWeek,agendaDay,list',
            center: 'title',
            right: 'prev, today, next'
        },
        buttonText: {
            today: 'Today',
            month: 'Month',
            week: 'Week',
            day: 'Day',
            list: 'List'
        },
        events: events, // Use the events fetched from the API
        editable: true,
        eventDrop: function (event, delta, revertFunc) {
            // Format start and end dates for the backend
            var start = moment(event.start).format("YYYY-MM-DD HH:mm:ss");
            var end = event.end ? moment(event.end).format("YYYY-MM-DD HH:mm:ss") : start; // Handle cases where end time might be undefined
            
            // Preserve the original title and other properties
            var title = event.title;
            var id = event.id;

            // Send an AJAX request to update the event in the database
            $.ajax({
                url: "update.php",
                type: "POST",
                data: {
                    title: title,
                    start: start,
                    end: end,
                    id: id
                },
                success: function (response) {
                    alert("Event updated successfully!");
                },
                error: function (xhr, status, error) {
                    alert("Error updating event: " + error);
                    revertFunc(); // Revert the event position on error
                }
            });
        },
        eventClick: function (event, jsEvent, view) {
            // Display the event details in a modal
            $('#eventDetailsModal .modal-title').text(event.title);
            $('#eventDetailsModal #event-start').text(moment(event.start).format('MMMM Do YYYY, h:mm A'));
            $('#eventDetailsModal #event-end').text(event.end ? moment(event.end).format('MMMM Do YYYY, h:mm A') : 'No End Time');
            $('#eventDetailsModal #event-description').text(event.description || 'No additional information available.');
            $('#eventDetailsModal').modal('show');
        }
    });
}

// Initialize everything once the document is ready
$(document).ready(function () {
    fetchData()
        .then((events) => {
            initializeCalendar(events); // Ensure 'events' is properly passed here
        })
        .catch((error) => {
            console.error("Error initializing calendar:", error);
        });
});
