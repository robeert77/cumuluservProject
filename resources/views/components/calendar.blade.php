<div class="d-flex justify-content-center justify-content-lg-start">
    <div class="calendar bg-white px-3 rounded mb-5 mb-lg-0">
        <div class="pt-3 pb-1 d-flex justify-content-between rounded-3 mb-0">
            <div class="dropdown">
                <a class="btn btn-white dropdown-toggle p-0 fs-5" role="button" id="calendar-month" data-bs-toggle="dropdown" aria-expanded="false"></a>
                <ul class="dropdown-menu overflow-auto border rounded-3" style="max-height: 250px;" aria-labelledby="dropdownMenuLink" id="months-options">

                </ul>
            </div>

            <div class="dropdown">
                <a class="btn btn-white dropdown-toggle p-0 fs-5" role="button" id="calendar-year" data-bs-toggle="dropdown" aria-expanded="false"></a>
                <ul class="dropdown-menu overflow-auto border rounded-3" style="max-height: 250px;" aria-labelledby="dropdownMenuLink" id="years-options">

                </ul>
            </div>
        </div>

        <hr class="my-1">

        <div class="rounded-3 py-2">
            <ul class="week-days text-decoration-none d-flex justify-content-between fw-bold fs-5 mb-1 px-0">
                <li class="calendar-cell">L</li>
                <li class="calendar-cell">M</li>
                <li class="calendar-cell">M</li>
                <li class="calendar-cell">J</li>
                <li class="calendar-cell">V</li>
                <li class="calendar-cell">S</li>
                <li class="calendar-cell">D</li>
            </ul>

            <div id="calendar-content"></div>
        </div>

        <hr class="my-1" style="height: 0.5px;">

        <div class="pb-2">
            <div class="d-flex calendar-content">
                <a id="legend-day" class="calendar-cell text-decoration-none text-secondary">
                    <div class="d-flex">
                        <span class="w-100 border-bottom border-3 border-warning"></span>
                    </div>
                </a>
                <h6 class="ms-3 mt-2 align-content-center text-secondary text-uppercase"> - vânzare produs</h6>
            </div>
        </div>
    </div>
</div>
<x-js.calendar :interventionDays="$interventionDays" :company="$company" />
