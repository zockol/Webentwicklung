document.getElementById('save').addEventListener('click', () => {
    const dropzone = document.getElementById('drop');
    const activities = dropzone.querySelectorAll('.draggable.valid-activity');
    const activityIds = Array.from(activities).map(activity => activity.dataset.activityId);


    localStorage.setItem('dropzoneActivities', JSON.stringify(activityIds));
    alert('Die Tätigkeiten wurden gespeichert.');
});

//Localstorage
document.addEventListener('DOMContentLoaded', () => {
    const dropzone = document.getElementById('drop');
    const storedActivityIds = JSON.parse(localStorage.getItem('dropzoneActivities') || '[]');

    storedActivityIds.forEach(activityId => {
        const originalItem = document.querySelector(`[data-activity-id="${activityId}"]`);
        if (originalItem) {
            const newItem = createDraggableItem(originalItem.innerText, activityId);
            dropzone.appendChild(newItem);
        }
    });
});


document.querySelectorAll('.draggable').forEach(item => {
    item.addEventListener('dragstart', event => {
        if (item.classList.contains('valid-activity')) {
            event.dataTransfer.setData('text/plain', event.target.dataset.activityId);
        }
    });
});

const dropzone = document.getElementById('drop');
dropzone.addEventListener('dragover', event => {
    event.preventDefault();
});

dropzone.addEventListener('drop', event => {
    event.preventDefault();
    const data = event.dataTransfer.getData('text/plain');
    if (data) {
        const originalItem = document.querySelector(`[data-activity-id="${data}"]`);
        if (originalItem) {
            const newItem = createDraggableItem(originalItem.innerText, data);
            dropzone.appendChild(newItem);
        }
    }
});

// Funktion zum Erstellen eines neuen draggable Elements mit einer Entfernen-Schaltfläche
function createDraggableItem(text, activityId) {
    const newItem = document.createElement('div');
    newItem.className = 'draggable valid-activity';
    newItem.dataset.activityId = activityId;
    newItem.innerText = text;
    /**newItem.setAttribute('draggable', 'true');
    newItem.addEventListener('dragstart', event => {
        event.dataTransfer.setData('text/plain', event.target.dataset.activityId);
    });**/


    const removeButton = document.createElement('button');
    removeButton.innerText = ' Entfernen';
    removeButton.addEventListener('click', () => {
        newItem.remove();
        updateLocalStorage();
    });
    newItem.appendChild(removeButton);

    return newItem;
}

//aktualisieren des local Storage
function updateLocalStorage() {
    const dropzone = document.getElementById('drop');
    const activities = dropzone.querySelectorAll('.draggable.valid-activity');
    const activityIds = Array.from(activities).map(activity => activity.dataset.activityId);
    localStorage.setItem('dropzoneActivities', JSON.stringify(activityIds));
}

// Button Funktionen
document.getElementById('previous_week').addEventListener('click', () => {

    alert('Vorherige Woche wird angezeigt.');
});

document.getElementById('next_week').addEventListener('click', () => {

    alert('Nächste Woche wird angezeigt.');
});

document.getElementById('random_select').addEventListener('click', () => {
    const activities = document.querySelectorAll('.draggable.valid-activity');
    const randomActivity = activities[Math.floor(Math.random() * activities.length)];
    if (randomActivity) {
        const newItem = createDraggableItem(randomActivity.innerText, randomActivity.dataset.activityId);
        dropzone.appendChild(newItem);
    }
});