<div class="card {{ $loop->last ? "" : "mb-2" }}">
    <div class="card-header bg-white border-0">
        <div class="btn-group">
            <button type="button" class="btn p-0 fs-5 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                {{ $company->name }}
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('detailsCompany', $company->id) }}">Detalii client</a></li>
                <li><a class="dropdown-item" href="{{ route('createIntervention', $company->id) }}">Formular intervenție</a></li>
                <li><a class="dropdown-item" href="{{ route('monthlyReports', ['id' => $company->id, 'date' => $currentDate]) }}">Vizualizare rapoarte</a></li>
                <li><a class="dropdown-item" href="{{ route('saleProductsCompany', $company->id) }}">Vânzare produse</a></li>
                <li><a class="dropdown-item" href="{{ route('displacementPdf', $company->id) }}" target="_blank">Formular deplasare</a></li>
                <li><a class="dropdown-item" href="#">Șterge client</a></li>
            </ul>
        </div>
    </div>
    <hr class="my-0 mx-3" style="height: 0.5px">
    <div class="card-body">
        <p class="card-text m-0">
            @if ($company->phone_number)
                Contact:
                <a href="tel: {{ $company->phone_number }}" class="fs-6 text-decoration-none"> {{ $company->phone_number }} </a>
            @else
                Adauga un contact din sectiunea 'Detalii client'!
            @endif
        </p>
    </div>
</div>
