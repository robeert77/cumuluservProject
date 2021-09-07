<x-app-layout>
    <div class="container py-5 h-100">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body px-3 py-5">
                <form method="POST" action="{{ route('updateCompany', $company->id) }}">
                    @csrf

                    <div class="row justify-content-between">
                        <div class="col-md-4">
                            <!-- Client name -->
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
                            <div class="form-check mt-4">
                                @if ($company->with_contract)
                                    <x-radio-input type="radio" name="contract" id="withContract" value="true" checked />
                                @else
                                    <x-radio-input type="radio" name="contract" id="withContract" value="true" />
                                @endif

                                <x-label class="form-check-label" for="withContract" :value="__('Cu contract')" />
                            </div>

                            <div class="form-check">
                                @if (!$company->with_contract)
                                    <x-radio-input type="radio" name="contract" id="withoutContract" value="false" checked />
                                @else
                                    <x-radio-input type="radio" name="contract" id="withoutContract" value="false" />
                                @endif

                                <x-label class="form-check-label" for="withoutContract" :value="__('Fara contract')" />
                            </div>

                            <div class="flex items-center justify-end mt-3">
                                <x-button class="btn btn-dark w-100">
                                    {{ __('Salveaza modificarile') }}
                                </x-button>
                            </div>
                        </div>

                        <div class="col-sm-7">
                            <textarea class="form-control border rounded" rows="17" name="details">{{ $company->details }}</textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
