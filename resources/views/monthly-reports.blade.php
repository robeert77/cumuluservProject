<x-app-layout>
    <div class="row justify-content-between mt-5">
        <div class="col-lg-4 pe-lg-0">
            <x-calendar :companyId="$id" :markedDays="$markedDays"/>
        </div>
        <div class="col-lg-8 ps-lg-0">
            <div class="d-flex justify-content-center">
                <div class="w-100 card-shadow bg-white rounded" style="min-height: 438px;">
                    <div class="pt-3 px-3">
                        <h3 class="mb-3">Raportul lunar pentru  {{ $client }} </h3>
                        @if (!empty($interventions))
                            <x-tables.interventions-list :interventions="$interventions"/>
                        @endif
                        <h5>Durata totală: <kbd class="rounded-3">{{ date('H', strtotime($totalTime)) }} ore și {{ date('i', strtotime($totalTime)) }}</kbd> minute. </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
