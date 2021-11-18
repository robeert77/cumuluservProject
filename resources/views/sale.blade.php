<x-app-layout>
    <div class="w-100 card-shadow bg-white rounded my-5">
        <div class="py-4 px-3">
            <form method="POST" action="{{ route('saveProducts') }}">
                @csrf

                <div class="">
                    <x-js.products-table />
                    <x-tables.products-table />
                </div>
                <div class="mb-1 mt-3">
                    <x-button class="btn-outline-primary rounded-pill w-100" style="max-width: 225px;">
                        {{ __('Salvează produsele') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
