<x-app-layout>
    <div class="row d-flex justify-content-center my-5">
        <div class="col-lg-4 card-shadow bg-white rounded">
            <div class="title-header pt-3 pb-1">
                <h3 class="font-weight-normal px-3">Adauga un client</h3>
            </div>
            <div class="pb-3 px-3">
                <form method="POST" action="{{ route('addCompany') }}">
                    @csrf

                    <!-- Client name -->
                    <div>
                        <x-label for="client" :value="__('Client')" />

                        <x-input id="client" type="text" name="client" :value="old('client')" required autofocus />
                    </div>

                    <!-- Phone number -->
                    <div class="mt-4">
                        <x-label for="phoneNumber" :value="__('Telefon contact')" />

                        <x-input id="phoneNumber" type="tel" name="phoneNumber" :value="old('phone_number')" />
                    </div>

                    <!-- Contract -->
                    <div class="form-check mt-4">
                        <x-radio-input type="radio" name="contract" id="withContract" value="true" checked />

                        <x-label class="form-check-label" for="withContract" :value="__('Cu contract')" />
                    </div>
                    <div class="form-check">
                        <x-radio-input type="radio" name="contract" id="withoutContract" value="false" />

                        <x-label class="form-check-label" for="withoutContract" :value="__('Fara contract')" />
                    </div>

                    <div class="flex items-center justify-end mt-3">
                        <x-button class="btn-outline-primary rounded-pill w-100 mb-2">
                            {{ __('Adaugare client') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
