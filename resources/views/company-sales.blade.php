<x-app-layout>
    <div class="w-100 card-shadow bg-white rounded mt-5">
        <div class="py-4 px-3">
            <form method="POST" action="{{ route('productsSave', $companyId) }}">
                @csrf

                <div class="">
                    <x-tables.products-table />
                </div>
                <div class="row justify-content-between mt-2">
                    <div class="col-sm">
                        <h5>Produse vândute:</h5>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="delivery-sale" name="delivered" value="true">
                            <x-label class="form-check-label" for="delievery-sale" :value="__('Prin livrare')" />
                        </div>

                        <div class="form-check mb-0">
                            <input type="radio" class="form-check-input" id="store-sale" name="delivered" value="false" required>
                            <x-label class="form-check-label" for="store-sale" :value="__('La magazin')" />
                        </div>
                    </div>
                    <div class="col-sm d-flex justify-content-sm-end align-items-end mb-1 mt-2 mt-sm-0">
                        <x-button class="btn-outline-primary rounded-pill w-100" style="max-width: 225px;">
                            {{ __('Salvează produsele') }}
                        </x-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
