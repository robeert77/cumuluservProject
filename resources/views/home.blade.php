<x-app-layout>
    <div class="row justify-content-evenly py-5">
        <div class="col-md-5 border rounded overflow-auto">
            <h3 class="fs-5">Clienti cu contract:</h3>
            <div class="container px-0 mt-4 mt-lg-0" style="max-height: 400px;">
                @foreach ($companiesWithContract as $company)
                    <x-company-features :company="$company"/>
                @endforeach
            </div>
        </div>
        <div class="col-md-5 border rounded overflow-auto">
            <h3 class="fs-5">Clienti fara contract:</h3>
            <div class="container px-0 mt-4 mt-lg-0" style="max-height: 500px;">
                @foreach ($companiesWithoutContract as $company)
                    <x-company-features :company="$company"/>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
