<x-app-layout>
    <div class="row mt-5 mb-5 mb-lg-3">
        <x-js.calendar :companyId="$companyId" :markedDays="$markedDays" />
        <x-calendar />
        <div class="col-lg-8">
            <div class="w-100 card-shadow bg-white rounded" style="min-height: 438px;">
                <div class="py-3 px-3">
                    @if (count($interventions) == 0 && count($products) == 0)
                        <h3>Selecteză o altă dată!</h3>
                        <h5>Nu există nici un raport pentru {{ $client }} în
                            <kbd class="rounded-3">{{ date('d.m.Y', strtotime($reportDate)) }}</kbd>
                        </h5>
                    @else
                        <div>
                            @foreach ($interventions as $intervention)
                                <a class="raport-index text-secondary p-0 fs-5 me-4 mb-2" data-bs-toggle="collapse" href="#intervention-report-{{ $loop->index }}"
                                role="button" aria-expanded={!! $loop->first ? "true" : "false" !!} aria-controls="intervention-report-{{ $loop->index }}">Raportul {{ $loop->index + 1 }}</a>
                            @endforeach

                            @if (count($products) != 0)
                                <a class="raport-index text-secondary p-0 fs-5 me-4 mb-2" data-bs-toggle="collapse" href="#products-sale"
                                role="button" aria-expanded={!! count($interventions) == 0 ? "true" : "false" !!} aria-controls="products-sale">Produse</a>
                            @endif
                        </div>
                        <hr class="my-2" style="height: 0.5px;">

                        @foreach ($interventions as $intervention)
                            <div class="collapse multi-collapse mt-2 {{ $loop->first ? "show" : "" }}" id="intervention-report-{{ $loop->index }}">
                                <x-intervention-report :intervention="$intervention" :client="$client"  />
                                {!! $loop->last ? "" : "<hr class=\"mb-2 mt-4\" style=\"height: 1px;\">" !!}
                            </div>
                        @endforeach

                        @if (count($products) != 0)
                            <div class="collapse multi-collapse mt-2 {{ count($interventions) == 0 ? "show" : "" }}" id="products-sale">
                                <h3 class="mb-4">Produsele vândute pentru {{ $client }} în
                                    <kbd class="rounded-3">{{ date('d.m.Y', strtotime($products[0]->day)) }} </kbd>
                                </h3>
                                <x-tables.products-show :products="$products"  />
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
