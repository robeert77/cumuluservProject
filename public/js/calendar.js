let today = new Date();
let selectedMonth, selectedYear, selectedDay, companyId;
let months = ['Ianuarie', 'Februarie', 'Martie', 'Aprilie', 'Mai', 'Iunie', 'Iulie', 'August', 'Septembrie', 'Octombrie', 'Noiembrie', 'Decembrie'];

window.onload = function() {
    let currentUrl = (new URL(window.location.href)).pathname;
    let urlSize = currentUrl.length;
    companyId = parseInt(currentUrl.substring(9));
    selectedYear = parseInt(currentUrl.substring(urlSize - 10, urlSize - 6));
    selectedMonth = parseInt(currentUrl.substring(urlSize - 5, urlSize - 3)) - 1;
    selectedDay = parseInt(currentUrl.substring(urlSize - 2));

    // generate months options
    for (let i = 0; i < 12; i++) {
        let button = createOption(months[i], 'months-options');
        button.setAttribute('href', reportRoute(selectedYear, i, selectedDay, 'month'));
    }

    // genereta years options
    for (let i = today.getFullYear(); i > 2020; i--) {
        let button = createOption(i, 'years-options');
        button.setAttribute('href', reportRoute(i, selectedMonth, selectedDay, 'month'));
    }

    calendarLegend('intervention-id');
    calendarLegend('product-id');
    showCalendar(selectedMonth, selectedYear);
};

// add the current day to the calendar legend
function calendarLegend(id) {
    document.getElementById(id).prepend(document.createTextNode(today.getDate().toString().padStart(2, '0')));
    document.getElementById(id).setAttribute('href', reportRoute(today.getFullYear(), today.getMonth(), today.getDate(), 'month'));
}

// create the dropdown options coresponding to parentId
function createOption(content, parentId) {
    let li = document.createElement('li');
    let aTag = document.createElement('a');
    aTag.appendChild(document.createTextNode(content));
    aTag.classList.add('dropdown-item');
    li.appendChild(aTag);
    document.getElementById(parentId).appendChild(li);
    return aTag;
}

// generate the route for a specific intervention or for a specific monthly report
function reportRoute(year, month, day, reportType) {
    return '/company/' + companyId + '/report/' + reportType + '/' + year.toString().padStart(2, '0') + '-' + (month + 1).toString().padStart(2, '0')
            + '-' + day.toString().padStart(2, '0');
}

// add coresponding css classes ti the coresponding html tag
function addCssClasses(classes, htmlTag) {
    for (let i = 0 ; i < classes.length; i++) {
        htmlTag.classList.add(classes[i]);
    }
}

// create the element which will hold the date
function createHtmlElement(row, content, cssClasses) {
    let aTag = document.createElement('a');
    let cellText = document.createTextNode(content.toString().padStart(2, '0'));
    addCssClasses(cssClasses, aTag);
    let div = document.createElement('div');

    if (cssClasses[0] != 'another-month') {
        div.classList.add('d-flex', 'justify-content-evenly', 'px-2');
        for (let i = 0; i < markedDays[content].length; i++) {
            let span = document.createElement('span');
            span.classList.add('w-100', markedDays[content][i]);
            div.appendChild(span);
        }
    }

    aTag.setAttribute('href', reportRoute(selectedYear, selectedMonth, content, 'day'));
    aTag.appendChild(cellText);
    aTag.appendChild(div);
    row.appendChild(aTag);
}

// return the number of days from the specified month
function numberOfDays(month, year) {
    return new Date(year, month + 1, 0).getDate();
}

// show the calendar for specified month and year
function showCalendar(month, year) {
    let firstDay = ((new Date(year, month)).getDay() + 7 - 1) % 7;
    let totalDays = numberOfDays(month, year);
    let fromAnotherMonth = numberOfDays(month - 1, year) - firstDay + 1;
    let currentDay = 1;

    document.getElementById('calendar-month').textContent = months[month];
    document.getElementById('calendar-year').textContent = year;
    document.getElementById('calendar-content').innerHTML = "";

    for (let i = 0; i < 6; i++) {
        let row = document.createElement('div');
        for (let j = 0; j < 7; j++) {
            if (i == 0 && j < firstDay || currentDay > totalDays) {
                createHtmlElement(row, fromAnotherMonth, ['another-month', 'calendar-cell', 'text-decoration-none', 'text-secondary']); // 'disabled in the future'
                fromAnotherMonth++;
            }
            else {
                let cellClasses = ['calendar-cell', 'text-decoration-none', 'text-secondary'];
                if (currentDay == today.getDate() && year == today.getFullYear() && month == today.getMonth()) {
                    cellClasses.push('active');
                }
                else if (currentDay == selectedDay && month == selectedMonth && year == selectedYear) {
                    cellClasses.push('selected-day');
                }

                createHtmlElement(row, currentDay, cellClasses);
                fromAnotherMonth = 1;
                currentDay++;
            }
        }
        row.classList.add('d-flex', 'fustify-content-between');
        document.getElementById('calendar-content').appendChild(row);
    }
}
