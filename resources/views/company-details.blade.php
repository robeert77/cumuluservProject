<x-app-layout>
    <div class="py-5">
        <div class="card mt-4">
            <h5 class="card-header fs-4"> {{ $company->name }} </h5>
            <div class="card-body">
                @if ($company->phone_number)
                    <span class="card-title fs-5"> Contact: </span>
                    <a href="tel: {{ $company->phone_number }}" class="fs-6 text-decoration-none"> {{ $company->phone_number }} </a>
                @else
                    <h3 class="card-title fs-5"> Momentan nu exista un contact.</h3>
                @endif
                <hr class="my-2 mx-1" style="height: 0.5px">

                @if (!$company->details)
                    <span class="card-title fs-5">Momentan nu exista detalii.</span>
                    <br>
                @else
                    <p> {{ $company->details }} </p>
                @endif
                <a href="/company/{{ $company->id }}/edit" class="btn btn-dark mt-2">Editeaza informatiile</a>
            </div>
        </div>
    </div>
</x-app-layout>
