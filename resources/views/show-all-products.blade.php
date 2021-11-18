<x-app-layout>
    <div class="row justify-content-evenly my-5">
        <div class="col-md-12">
            <div class="card-shadow bg-white rounded">
                <div class="py-4 px-3">
                    <div class="row justify-content-between">
                        <div class="col-lg-4 col-md-6">
                            <form class="" action="{{ route('searchProducts') }}" method="get">
                                @csrf
                                <div class="input-group bg-light border rounded-pill mb-3">
                                    <x-input type="text" class="border-0 rounded-pill" name="search" placeholder="Caută produse..."  />
                                    <div class="">
                                        <button type="submit" class="btn border-start rounded-0">
                                            <x-icons.search />
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <a href="{{ route('saleProducts') }}" class="btn btn-outline-primary rounded-pill w-100">Adaugă produse</a>
                        </div>
                    </div>
                    <div class="mt-3 mt-md-2">
                        @if (count($products))
                            <x-tables.products-show :products="$products"  />
                        @else
                            <h5 class="mb-0">Nu există produse care să se potrivească cu căutarea dumneavoastră!</h5>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
