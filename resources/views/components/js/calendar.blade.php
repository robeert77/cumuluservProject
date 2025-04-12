<script>
    let interventionDays = {!! json_encode($interventionDays ?? []) !!};
    let company = {!! json_encode($company->toArray() ?? []) !!};
</script>
<script type="text/javascript" src="{{ URL::asset('js/calendar.js') }}"></script>
