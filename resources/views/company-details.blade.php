<x-app-layout>
    <div class="row d-flex justify-content-center my-5">
        <div class="col-lg-10 card-shadow bg-white rounded">
            <div class="title-header px-3 pt-3 mb-2">
                <h5 class="fs-3 mb-0"> {{ $company->name }} </h5>
                @if ($company->phone_number)
                    <span class="card-title fs-5 m-0"> Contact: </span>
                    <a href="tel: {{ $company->phone_number }}" class="fs-5 text-decoration-none"> {{ $company->phone_number }} </a>
                @else
                    <h3 class="card-title fs-5"> Momentan nu exista un contact.</h3>
                @endif
            </div>
            <div class="pb-3 px-3">
                <hr class="my-2" style="height: 0.5px">

                <div class="mt-2">
                    @if (!$company->details)
                        <span class="card-title fs-5">Momentan nu exista detalii.</span>
                        <br>
                    @else
                        {{ Markdown::parse($details) }}
                    @endif
                </div>

                <a href="{{ route('editCompany', $company->id) }}" class="btn btn-outline-primary rounded-pill mt-3 mb-2 w-100" style="max-width: 225px;">Editează informațiile</a>
            </div>
        </div>
    </div>
</x-app-layout>
