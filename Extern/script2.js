let beginningOfCurrentWeek = new Date();
let endOfCurrentWeek = new Date();
const wochenanzeige = document.getElementById("Wochenanzeige");
const urlaub = document.getElementById("Urlaub");
const zeit = document.getElementById("Zeitausgleich");
const krank = document.getElementById("Krankheit");
let data;

window.onload = async function () {
  data = await getAntraege(window.location.origin);
  setcurrentWeek();
  setRanges();
};

function weekBack() {
  beginningOfCurrentWeek.setDate(beginningOfCurrentWeek.getDate() - 7);
  endOfCurrentWeek.setDate(endOfCurrentWeek.getDate() - 7);
  setWeek(beginningOfCurrentWeek, endOfCurrentWeek);
  setRanges();
}

function nextWeek() {
  beginningOfCurrentWeek.setDate(beginningOfCurrentWeek.getDate() + 7);
  endOfCurrentWeek.setDate(endOfCurrentWeek.getDate() + 7);
  setWeek(beginningOfCurrentWeek, endOfCurrentWeek);
  setRanges();
}

function clearRanges() {
    for (var i = 0; i < 7; i++) { // Change loop to start from 0
      urlaub.children[i].style.backgroundColor = "#eeeeee";
      krank.children[i].style.backgroundColor = "#eeeeee";
      zeit.children[i].style.backgroundColor = "#eeeeee";
    }
  }

  function setRanges() {
    clearRanges();
  
    // Ensure data is an array before iterating
    if (!Array.isArray(data)) {
      console.error("Data is not an array:", data);
      return;
    }
  
    // Iterate directly over the data array
    data.forEach((element) => {
      const firstDay = new Date(element.Startzeit);
      const lastDay = new Date(element.Endzeit);
      const range = getOverlap(firstDay, lastDay, beginningOfCurrentWeek, endOfCurrentWeek);
  
      if (range) {
        let s = range[0].getDay();
        let e = range[1].getDay();
  
        // Adjust for Sunday as day 7 instead of 0
        if (s === 0) s = 7;
        if (e === 0) e = 7;
  
        // Use the 'Bezeichnung' field to determine the type of leave
        switch (element.Bezeichnung) {
          case 'Urlaub':
            setRange(s, e, urlaub, "red");
            break;
          case 'Zeitausgleich':
            setRange(s, e, zeit, "blue");
            break;
          case 'Krankheit':
            setRange(s, e, krank, "green");
            break;
          default:
            break;
        }
      }
    });
  }
  


function setRange(start, end, tablerow, color) {
    const elements = tablerow.children;
    for (var i = start; i <= end; i++) {
      if (elements[i]) { // Check if the child element exists
        elements[i].style.backgroundColor = color;
      }
    }
}

function getOverlap(a_start, a_end, b_start, b_end) {
  const overlap = [];
  if (a_start <= b_start && a_end >= b_end) {
    overlap.push(b_start, b_end);
    return overlap;
  } else if (a_start >= b_start && a_start <= b_end && a_end >= b_end) {
    overlap.push(a_start, b_end);
    return overlap;
  } else if (a_start <= b_start && a_end >= b_start && a_end <= b_end) {
    overlap.push(b_start, a_end);
    return overlap;
  } else if (a_start >= b_start && a_end >= b_start && a_end <= b_end) {
    overlap.push(a_start, a_end);
    return overlap;
  }
}

function setcurrentWeek() {
  const currentDate = new Date();
  const currentDay = currentDate.getDay();
  let differenceToMonday = currentDay;
  if (currentDay == 0) {
    differenceToMonday = 6;
  } else {
    differenceToMonday = differenceToMonday - 1;
  }
  beginningOfCurrentWeek.setDate(currentDate.getDate() - differenceToMonday);
  endOfCurrentWeek.setDate(beginningOfCurrentWeek.getDate() + 6);
  setWeek(beginningOfCurrentWeek, endOfCurrentWeek);
}

function setWeek(first, last) {
  wochenanzeige.innerHTML =
    first.toLocaleDateString("de-De") +
    " - " +
    last.toLocaleDateString("de-De");
}

async function getAntraege(uri) {
  let x = await fetch("http://localhost:3003/read_api.php");
  let y = await x.json();
  return y;
}
