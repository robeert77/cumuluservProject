<x-app-layout>
    <div class="row mt-5 justify-content-between">
        <div class="col-lg-3 bg-light">
            Aici ar trebui sa fie calendaru cred!
        </div>
        <div class="col-lg-8">
            <h3>Raportul lunar pentru  {{ $client }} </h3>
            <h5>Numar total de ore lucrat: {{ date('H:i', strtotime($totalTime)) }}</h5>
            <h5>Numar total de interventi pentru luna curenta: {{ $numberInterventions }}</h5>
        </div>
    </div>
</x-app-layout>
