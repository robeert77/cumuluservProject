let today = new Date();
let selectedMonth, selectedYear, selectedDay;
let months = ['Ianuarie', 'Februarie', 'Martie', 'Aprilie', 'Mai', 'Iunie', 'Iulie', 'August', 'Septembrie', 'Octombrie', 'Noiembrie', 'Decembrie'];

window.onload = function() {
    // let currentUrl = (new URL(window.location.href)).pathname;
    // let urlSize = currentUrl.length;
    // selectedYear = parseInt(currentUrl.substring(urlSize - 10, urlSize - 6));
    // selectedMonth = parseInt(currentUrl.substring(urlSize - 5, urlSize - 3)) - 1;
    // selectedDay = parseInt(currentUrl.substring(urlSize - 2));

    selectedYear = 2025;
    selectedMonth = 3;
    selectedDay = 11;

    for (let i = 0; i < 12; i++) {
        let button = createOption(months[i], 'months-options', i === selectedMonth);
        button.setAttribute('href', reportRoute(selectedYear, i, selectedDay, 'month'));
    }

    for (let i = today.getFullYear(); i > 2020; i--) {
        let button = createOption(i, 'years-options', i === selectedYear);
        button.setAttribute('href', reportRoute(i, selectedMonth, selectedDay, 'month'));
    }

    let legendDay = document.getElementById('legend-day');
    let contentLegend = document.createTextNode(selectedDay.toString().padStart(2, '0'));
    legendDay.insertBefore(contentLegend, legendDay.firstChild)

    showCalendar(selectedMonth, selectedYear);
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

function reportRoute(year, month, day, reportType) {
    // create a route for tasks
    if (!company['id']) {
        return '/tasks/' + year.toString().padStart(2, '0') + '-' + (month + 1).toString().padStart(2, '0') + '-' + day.toString().padStart(2, '0');
    }
    // we create a route to reports only if we have an id for an company
    return '/company/' + company['id'] + '/report/' + reportType + '/' + year.toString().padStart(2, '0') + '-' + (month + 1).toString().padStart(2, '0') + '-' + day.toString().padStart(2, '0');
}

function addCssClasses(htmlElement, classes) {
    for (let i = 0 ; i < classes.length; i++) {
        htmlElement.classList.add(classes[i]);
    }
}

function createCalendarDayElement(content, cssClasses, id) {
    let aElement = document.createElement('a');
    aElement.setAttribute('id', id);
    aElement.setAttribute('href', reportRoute(selectedYear, selectedMonth, content, 'day'));
    aElement.innerHTML = content.toString().padStart(2, '0');
    addCssClasses(aElement, cssClasses);

    if (cssClasses[0] !== 'another-month' && interventionDays.length && interventionDays[0] === content) {
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

    for (let i = 0; i < 6; i++) {
        let row = document.createElement('div');
        addCssClasses(row, ['d-flex', 'justify-content-between']);

        for (let j = 0; j < 7; j++) {
            let dayCell;
            if ((i === 0 && j < firstDayOfMonthIndex) || currentDay > totalDaysInMonth) {
                dayCell = createCalendarDayElement(dayFromAnotherMonth, ['another-month', 'calendar-cell', 'text-decoration-none', 'text-secondary'], `${dayFromAnotherMonth++}-${month}-${year}`);
            }
            else {
                dayCell = createCalendarDayElement(currentDay, ['calendar-cell', 'text-decoration-none', 'text-secondary'], `${currentDay++}-${month}-${year}`);
                dayFromAnotherMonth = 1;
            }

            row.appendChild(dayCell);
        }
        document.getElementById('calendar-content').appendChild(row);
    }

    addCssClasses(document.getElementById(`${today.getDate()}-${today.getMonth()}-${today.getFullYear()}`), ['active']);
    addCssClasses(document.getElementById(`${selectedDay}-${selectedMonth}-${selectedYear}`), ['selected-day']);
}
