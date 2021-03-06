<x-app-layout>
    <div class="my-5">
        <form method="POST" action="{{ route('updateCompany', $company->id) }}">
            @csrf
            <div class="row card-shadow px-3 py-5 justify-content-between bg-white rounded">
                <div class="col-lg-4">
                    <h3 class="font-weight-normal pb-2">Editează informațiile</h3>

                    <div>
                        <x-label for="client" :value="__('Client')" />

                        <x-input id="client" type="text" name="client" :value="__($company->name)" required autofocus />
                    </div>

                    <!-- Phone number -->
                    <div class="mt-4">
                        <x-label for="phoneNumber" :value="__('Telefon contact')" />

                        <x-input id="phoneNumber" type="tel" name="phoneNumber" :value="__($company->phone_number)" placeholder="Telefon" />
                    </div>

                    <!-- Contract -->
                    <div class="mt-4">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="withContract" name="contract" value="true" {{ $company->with_contract == 1 ? 'checked' : '' }}>
                            <x-label class="form-check-label" for="withContract" :value="__('Cu contract')" />
                        </div>

                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="withoutContract" name="contract" value="false" {{ $company->with_contract != 1 ? 'checked' : '' }}>
                            <x-label class="form-check-label" for="withoutContract" :value="__('Fara contract')" />
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-button class="btn-outline-primary rounded-pill w-100">
                            {{ __('Salvează modificările') }}
                        </x-button>
                    </div>
                </div>
                <div class="col-lg-7 mt-5 mt-lg-0">
                    <textarea class="form-control border rounded" rows="12" name="details" placeholder="Informații suplimentare">{{ $company->details }}</textarea>
                    <x-markdown />
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
