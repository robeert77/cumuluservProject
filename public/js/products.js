let lastLine = 1;
let today = formatDate(new Date());
let columnsId = ['name-', 'serial-number-', 'part-number-', 'date-', 'price-'];

window.onload = function() {
    addTableLine(lastLine)
}

function getCurrentLine(inputId) {
    return parseInt(inputId.substring(inputId.lastIndexOf('-') + 1));
}

// function that check the last line, check if have to insert a new line or do delete the last one
function checkLineStatus(event, inputId) {
    let currentLine = getCurrentLine(inputId);
    if (event.key.length > 1 && currentLine == lastLine - 1 && emptyLine(lastLine - 1)) {
        lastLine--;
        deleteTableLine(lastLine + 1);
    }
    else if (event.key.length == 1 && currentLine == lastLine && !emptyLine(lastLine)) {
        lastLine++;
        addTableLine(lastLine);
    }
}

// function that check if the last line is empty or not, except the date column
function emptyLine(currentLine) {
    for (let i = 0; i < columnsId.length; i++) {
        if (i != 3 && document.getElementById(columnsId[i] + currentLine).value.length != 0) {
            return false;
        }
    }
    return true;
}

// function that remove the last line from the table
function deleteTableLine(currentLine) {
    document.getElementById('line-' + currentLine).classList.remove('add-line');
    document.getElementById('line-' + currentLine).classList.add('remove-line');
    setTimeout(() => {
            document.getElementById('line-' + currentLine).remove();
        }, 500);
}

// function that add a new line to the table
function addTableLine(currentLine) {
    cssClass = ((currentLine == 1) ? '' : ' class="add-line"');
    console.log(cssClass);
    document.getElementById('table-body').insertAdjacentHTML('beforeend',  '<tr id="line-' + currentLine + '"' + cssClass + '>' +
            '<th scope="row" class="text-center">' + lastLine + '.</th>' +
            '<td class="py-0 px-1">' +
                '<input type="text" class="form-control px-2 table-input" id="name-' + lastLine + '" name="name-' + lastLine + '" onkeyup="checkLineStatus(event, id)">' +
            '</td>' +
            '<td class="py-0 px-1">'  +
                '<input type="text" class="form-control px-2 table-input" id="serial-number-' + lastLine + '" name="serial-number-' + lastLine + '" onkeyup="checkLineStatus(event, id)">' +
            '</td>' +
            '<td class="py-0 px-1">' +
                '<input type="text" class="form-control px-2 table-input" id="part-number-' + lastLine + '" name="part-number-' + lastLine + '" onkeyup="checkLineStatus(event, id)">' +
            '</td>' +
            '<td class="py-0 px-1">' +
                '<input type="text" class="form-control px-2 table-input" value="' + today + '" id=price-' + lastLine + '" name="date-' + lastLine + '" onkeyup="checkLineStatus(event, id)">' +
            '</td>' +
            '<td class="py-0 px-1">' +
                '<input type="text" class="form-control px-2 table-input" id="price-' + lastLine + '" name="price-' + lastLine + '" onkeyup="checkLineStatus(event, id)">' +
            '</td>' +
        '</tr>');
}

// function that formate the date in coresponding format
function formatDate(today) {
    return today.getDate().toString().padStart(2, '0') + "." + (today.getMonth() + 1).toString().padStart(2, '0') + "." + today.getFullYear().toString();
}
