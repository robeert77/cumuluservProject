<x-app-layout>
    <div class="row justify-content-evenly mt-5">
        <div class="col-lg-5">
            <div class="card-shadow bg-white rounded">
                <div class="title-header pt-3 pb-1">
                    <h3 class="font-weight-normal px-3">Clienți cu contract</h3>
                </div>
                <div class="pb-3 px-3">
                    <div class="container overflow-auto p-0 mt-1 mt-lg-0" style="max-height: 350px;">
                        @foreach ($companiesWithContract as $company)
                            <x-company-features :company="$company" :currentDate="$currentDate"/>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 my-5 my-lg-0">
            <div class="card-shadow bg-white rounded">
                <div class="title-header pt-3 pb-1">
                    <h3 class="font-weight-normal px-3">Clienți fără contract</h3>
                </div>
                <div class="pb-3 px-3">
                    <div class="container overflow-auto px-0 mt-1 mt-lg-0" style="max-height: 350px;">
                        @foreach ($companiesWithoutContract as $company)
                            <x-company-features :company="$company" :currentDate="$currentDate"/>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
