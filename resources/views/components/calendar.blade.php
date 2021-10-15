<script>var interventionDays = <?= json_encode($markedDays); ?>; </script>
<script type="text/javascript" src="{{ URL::asset('js/calendar.js') }}"></script>

<div class="col-lg-4 pe-lg-0">
    <div class="d-flex justify-content-center justify-content-lg-start">
        <div class="calendar bg-white px-3 rounded mb-5 mb-lg-0">
            <div class="bg-white pt-3 pb-1 d-flex justify-content-between rounded-3 mb-0">
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

            <hr class="my-1" style="height: 0.5px;">

            <div class="bg-white rounded-3 py-2">
                <ul class="week-days text-decoaration-none d-flex justify-content-between fw-bold fs-5 mb-1 px-0">
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

            <div class="bg-white pb-2" id="calendar-legend">
                <div class="row">
                    <div class="col-2 d-flex">
                        <a href="#" class="calendar-cell text-decoration-none text-secondary" id="intervention-id">
                            <div class="d-flex justify-content-evenly px-2">
                                <span class="intervention-mark w-100"></span>
                            </div>
                        </a>
                    </div>
                    <div class="col-10 p-0">
                        <h6 class="text-secondary text-uppercase" style="margin-top: 12px;"> - intervenție</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-2 d-flex">
                        <a href="#" class="calendar-cell text-decoration-none text-secondary" id="product-id">
                            <div class="d-flex justify-content-evenly px-2">
                                <span class="product-mark w-100"></span>
                            </div>
                        </a>
                    </div>
                    <div class="col-10 p-0">
                        <h6 class="text-secondary text-uppercase" style="margin-top: 12px;"> - vânzare produs</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
