<x-app-layout>
    <div class="row d-flex justify-content-center my-5">
        <div class="col-md-5 card-shadow bg-white rounded">
            <div class="py-4 px-3">
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('editIntervention', $intervention->id) }}">
                    @csrf

                    <!-- Date intervention -->
                    <div>
                        <x-label for="name" :value="__('Data intervenției')" />

                        <x-input id="name" class="block mt-1 w-full" type="date" name="dateIntervention" :value="__($intervention->day)" required />
                    </div>

                    <!-- Start At -->
                    <div class="mt-4">
                        <x-label for="email" :value="__('Oră început')" />

                        <x-input id="email" class="block mt-1 w-full" type="time" name="startAt" :value="__($intervention->start_at)" required />
                    </div>

                    <!-- End At -->
                    <div class="mt-4">
                        <x-label for="password" :value="__('Oră sfârșit')" />

                        <x-input id="email" class="block mt-1 w-full" type="time" name="endAt" :value="__($intervention->end_at)" required />
                    </div>

                    <!-- Observations -->
                    <div class="mt-4">
                        <x-label for="observations" :value="__('Observații intervenție')" />

                        <textarea class="form-control border rounded fs-6" rows="7" id="observations" name="observations" required>{{ $intervention->observations }}</textarea>

                        <x-markdown class="mt-0" />
                    </div>

                    <!-- Intervention made by -->
                    <div class="mt-4">
                        <select class="form-select" name="users" aria-label="Default select example">\
                            @foreach ($users as $user)
                                <option {{ $user->name == $intervention->mabe_by ? "selected": ""}} value="{{ $user->id }}"> {{ $user->name }} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-button class="btn-outline-primary rounded-pill w-100 mb-2">
                            {{ __('Salvează intervenția') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
