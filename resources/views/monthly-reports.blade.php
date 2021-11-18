<x-app-layout>
    <div class="row my-5">
        <x-js.calendar :companyd="$id" :markedDays="$markedDays" />
        <x-calendar />
        <div class="col-lg-8 ps-lg-0">
            <div class="d-flex justify-content-center">
                <div class="w-100 card-shadow bg-white rounded" style="min-height: 438px;">
                    <div class="pt-3 px-3">
                        <div class="mb-4">
                            <h3 class="mb-3">Raportul lunar pentru {{ $client }} </h3>
                            @if (!empty($interventions))
                                <x-tables.interventions-table :interventions="$interventions"/>
                            @endif
                            <h5>Durata totală:
                                <kbd class="rounded-3">{{ $totalTime ? date('H', strtotime($totalTime)) : '00' }}</kbd>
                                ore și
                                <kbd class="rounded-3">{{ $totalTime ? date('i', strtotime($totalTime)) : '00' }}</kbd>
                                minute.
                            </h5>
                        </div>
                        <hr class="my-2" style="height: 0.5px;">
                        <div class="mt-3 mb-4">
                            <h3 class="mb-3">Produsele vândute în luna curentă pentru {{ $client }} </h3>
                            <x-tables.products-show :products="$products" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
