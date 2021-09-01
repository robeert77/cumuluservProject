<x-app-layout>
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5">
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
                                <x-button class="btn btn-dark w-100">
                                    {{ __('Adaugare client') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
