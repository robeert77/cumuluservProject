let today = new Date();
let selectedDay = selectedDate.getDate() ;
let selectedMonth = selectedDate.getMonth();
let selectedYear = selectedDate.getFullYear();

window.onload = function() {
    for (let i = 0; i < 12; i++) {
        let button = createOption(months[i], 'months-options', i === selectedMonth);
        button.setAttribute('href', reportRoute(selectedYear, i, selectedDay));
    }

    for (let i = today.getFullYear(); i > 2020; i--) {
        let button = createOption(i, 'years-options', i === selectedYear);
        button.setAttribute('href', reportRoute(i, selectedMonth, selectedDay));
    }

    let legendDay = document.getElementById('legend-day');
    let contentLegend = document.createTextNode(selectedDay.toString().padStart(2, '0'));
    legendDay.insertBefore(contentLegend, legendDay.firstChild)

    showCalendar(selectedMonth, selectedYear);

    addCssClasses(document.getElementById(`${selectedYear}-${selectedMonth}-${selectedDay}`), ['bg-info', 'rounded-circle', 'bg-opacity-25']);

    let todayElement = document.getElementById(`${today.getFullYear()}-${today.getMonth()}-${today.getDate()}`);
    if (todayElement) {
        addCssClasses(todayElement, ['bg-info', 'rounded-circle', 'bg-opacity-75']);
    }
};

function createOption(content, parentId, isActive = null) {
    let aElement = document.createElement('a');
    aElement.innerHTML = content;
    addCssClasses(aElement, isActive ? ['dropdown-item', 'active'] : ['dropdown-item']);

    let li = document.createElement('li');
    li.appendChild(aElement);
    document.getElementById(parentId).appendChild(li);

    return aElement;
}

function reportRoute(year, month, day) {
    return anotherDateURL + `?date=${year}-${(month + 1).toString().padStart(2, '0')}-${day.toString().padStart(2, '0')}`;
}

function addCssClasses(htmlElement, classes) {
    for (let i = 0 ; i < classes.length; i++) {
        htmlElement.classList.add(classes[i]);
    }
}

function createCalendarDayElement(content, cssClasses, id) {
    let aElement = document.createElement('a');
    aElement.setAttribute('id', id);
    aElement.setAttribute('href', reportRoute(selectedYear, selectedMonth, content));
    aElement.innerHTML = content.toString().padStart(2, '0');
    addCssClasses(aElement, cssClasses);

    if (!cssClasses.includes('another-month') && interventionDays.length && interventionDays[0] === content) {
        let divElement = document.createElement('div');
        addCssClasses(divElement, ['d-flex', 'justified-content-evenly', 'align-items-end']);

        let spanElement = document.createElement('span');
        addCssClasses(spanElement, ['w-100', 'border-bottom', 'border-3', 'border-warning']);

        divElement.appendChild(spanElement);
        aElement.appendChild(divElement);

        interventionDays.shift();
    }

    return aElement;
}

function getNumberOfDays(month, year) {
    return new Date(year, month + 1, 0).getDate();
}

function getDayOfWeekIndex(year, month, day = 1) {
    let date = new Date(year, month, day);
    return ((date.getDay() + 6) % 7);
}

function showCalendar(month, year) {
    document.getElementById('calendar-month').textContent = months[month];
    document.getElementById('calendar-year').textContent = year;
    document.getElementById('calendar-content').innerHTML = "";

    let firstDayOfMonthIndex = getDayOfWeekIndex(year, month);
    let totalDaysInMonth = getNumberOfDays(month, year);
    let dayFromAnotherMonth = getNumberOfDays(month - 1, year) - firstDayOfMonthIndex + 1;
    let currentDay = 1;

    for (let i = 0; currentDay <= totalDaysInMonth; i++) {
        let row = document.createElement('div');
        addCssClasses(row, ['d-flex', 'justify-content-between']);

        for (let j = 0; j < 7; j++) {
            let dayCell;
            if ((i === 0 && j < firstDayOfMonthIndex) || currentDay > totalDaysInMonth) {
                dayCell = createCalendarDayElement(dayFromAnotherMonth, ['another-month', 'calendar-cell', 'text-decoration-none', 'text-secondary'], `${year}-${month}-${dayFromAnotherMonth++}`);
            }
            else {
                dayCell = createCalendarDayElement(currentDay, ['calendar-cell', 'text-decoration-none', 'text-secondary', 'rounded-circle'], `${year}-${month}-${currentDay++}`);
                dayFromAnotherMonth = 1;
            }

            row.appendChild(dayCell);
        }
        document.getElementById('calendar-content').appendChild(row);
    }
}
