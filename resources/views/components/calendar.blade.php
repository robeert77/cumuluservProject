<div class="d-flex justify-content-center justify-content-lg-start">
    <div class="calendar bg-white px-3 rounded mb-5 mb-lg-0">
        <div class="pt-3 pb-1 d-flex justify-content-between mb-0">
            <div class="dropdown mx-2">
                <a class="btn btn-white dropdown-toggle p-0 fs-5" role="button" id="calendar-month" data-bs-toggle="dropdown" aria-expanded="false"></a>
                <ul class="dropdown-menu overflow-auto border" style="max-height: 250px;" aria-labelledby="dropdownMenuLink" id="months-options">

                </ul>
            </div>

            <div class="dropdown mx-2">
                <a class="btn btn-white dropdown-toggle p-0 fs-5" role="button" id="calendar-year" data-bs-toggle="dropdown" aria-expanded="false"></a>
                <ul class="dropdown-menu overflow-auto border" style="max-height: 250px;" aria-labelledby="dropdownMenuLink" id="years-options">

                </ul>
            </div>
        </div>

        <hr class="my-1">

        <div class="py-2">
            <ul class="text-decoration-none d-flex justify-content-between fw-bold fs-5 mb-1 px-0">
                <li class="calendar-cell">{{ __('calendar.monday_initial') }}</li>
                <li class="calendar-cell">{{ __('calendar.tuesday_initial') }}</li>
                <li class="calendar-cell">{{ __('calendar.wednesday_initial') }}</li>
                <li class="calendar-cell">{{ __('calendar.thursday_initial') }}</li>
                <li class="calendar-cell">{{ __('calendar.friday_initial') }}</li>
                <li class="calendar-cell">{{ __('calendar.saturday_initial') }}</li>
                <li class="calendar-cell">{{ __('calendar.sunday_initial') }}</li>
            </ul>

            <div id="calendar-content"></div>
        </div>

        <hr class="my-1" style="height: 0.5px;">

        <div class="pb-2">
            <div class="d-flex calendar-content">
                <a id="legend-day" class="calendar-cell text-decoration-none text-secondary rounded-circle">
                    <div class="d-flex">
                        <span class="w-100 border-bottom border-3 border-warning"></span>
                    </div>
                </a>
                <h6 class="ms-3 mt-2 align-content-center text-secondary text-uppercase"> - {{ __('interventions.intervention') }}</h6>
            </div>
        </div>
    </div>
</div>
<script>
    let months = @json(__('calendar.months'));
    let anotherDateURL = '{{ route('companies.interventions.byDate', $company) }}';
    let selectedDate = new Date('{{ $date }}');
    let interventionDays = @json($interventionDays ?? []);
    let company = @json($company->toArray() ?? []);
</script>
<script type="text/javascript" src="{{ URL::asset('js/calendar.js') }}"></script>
