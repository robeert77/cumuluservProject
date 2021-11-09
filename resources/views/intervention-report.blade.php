<x-app-layout>
    <div class="row mt-5 mb-5 mb-lg-3">
        <x-calendar :companyId="$companyId" :markedDays="$markedDays"/>
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
                            @for ($i = 0; $i < count($interventions); $i++)
                                <a class="raport-index text-secondary p-0 fs-5 me-4 mb-2" data-bs-toggle="collapse" href="#intervention-report-{{ $i }}"
                                role="button" aria-expanded={!! $i == 0 ? "true" : "false" !!} aria-controls="intervention-report-{{ $i }}">Raportul {{ $i + 1 }}</a>
                            @endfor

                            @if (count($products) != 0)
                                <a class="raport-index text-secondary p-0 fs-5 me-4 mb-2" data-bs-toggle="collapse" href="#products-sale"
                                role="button" aria-expanded="false" aria-controls="products-sale">Produse</a>
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
                            <div class="collapse multi-collapse mt-2" id="products-sale">
                                <x-tables.products-show :products="$products" :client="$client"  />
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
