<x-app-layout>
    <div class="row mt-5 justify-content-between">
        <div class="col-lg-4 bg-light">
            <x-calendar :companyId="$id" :markedDays="$markedDays"/>
        </div>
        <div class="col-lg-8">
            <div class="d-flex justify-content-center">
                <div class="w-100 card-shadow bg-white rounded" style="min-height: 438px;">
                    <div class="pt-3 px-3">
                        @if ($intervention)
                            <h3>Raportul de interventie pentru: {{ $client }} </h3>
                            <h5>Data interventiei: {{ date('d.m.Y', strtotime($intervention[0]->day)) }}</h5>
                            <h5>Ora de inceput a interventiei: {{ date('H:i', strtotime($intervention[0]->start_at)) }}</h5>
                            <h5>Orad de sfarsti a interventiei: {{ date('H:i', strtotime($intervention[0]->end_at)) }}</h5>
                            <h5>Observatii interventie:</h5>
                                <p> {{ Markdown::parse($intervention[0]->observations) }} </p>
                            <h5>Interventie realizata de: {{ $intervention[0]->mabe_by }}</h5>
                        @else
                            <h3>Nu exista nici un raport pentru {{ $client }} in data {{ date('d.m.Y', strtotime($reportDate)) }}. </h3>
                            <h5>Selecteza o alta data.</h5>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
