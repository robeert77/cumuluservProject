<x-app-layout>
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5">
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <form method="POST" action="{{ route('createIntervention', $id) }}">
                            @csrf

                            <!-- Date intervention -->
                            <div>
                                <x-label for="name" :value="__('Data interventiei')" />

                                <x-input id="name" class="block mt-1 w-full" type="date" name="dateIntervention" :value="old('name')" required />
                            </div>

                            <!-- Start At -->
                            <div class="mt-4">
                                <x-label for="email" :value="__('Ora inceput')" />

                                <x-input id="email" class="block mt-1 w-full" type="time" name="startAt" :value="old('email')" required />
                            </div>

                            <!-- End At -->
                            <div class="mt-4">
                                <x-label for="password" :value="__('Ora sfarsit')" />

                                <x-input id="email" class="block mt-1 w-full" type="time" name="endAt" :value="old('email')" required />

                            </div>

                            <!-- Observations -->
                            <div class="mt-4">
                                <x-label for="observations" :value="__('Observatii interventie')" />

                                <textarea class="form-control border rounded" rows="7" id="observations" name="observations"></textarea>
                            </div>

                            <!-- Intervention made by -->
                            <div class="mt-4">
                                <select class="form-select" name="users" aria-label="Default select example">
                                    @foreach ($users as $user)
                                        @if ($user->name == Auth::user()->name)
                                            <option selected value="{{ $user->id }}"> {{ $user->name }} </option>
                                        @else
                                            <option value="{{ $user->id }}"> {{ $user->name }} </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-button class="btn btn-dark w-100 mb-2">
                                    {{ __('Salveaza interventia') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
