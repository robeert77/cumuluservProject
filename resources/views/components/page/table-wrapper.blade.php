<div class="card-shadow card bg-white rounded my-5 py-4">
    <div class="card-header border-0">
        <div class="d-flex justify-content-between title-header">
            <h3 class="font-weight-normal">{{ __($title) }}</h3>
            <a href="{{ $addButtonRoute }}">
                <x-button class="px-4" type="button" color="primary">
                    <x-icon name="plus-lg" color="white" class="me-1"/>
                    {{ __($addButtonText) }}
                </x-button>
            </a>
        </div>

        <div class="d-flex align-items-center gap-1 mt-3">
            <x-button>
                <x-icon name="chevron-down" color="secondary" size="4" data-bs-toggle="collapse" data-bs-target="#filters_section" aria-expanded="false" aria-controls="filters_section"/>
            </x-button>
            <hr class="flex-grow-1">
        </div>

        <div class="collapse" id="filters_section">
            {{ $filters }}
            <hr>
        </div>
    </div>

    <div class="px-0 px-sm-3">
        <div class="table-responsive">
            <table class="table table-hover my-3">
                <thead class="bg-light">
                    <tr class="fs-5">
                        {{ $tableHead }}
                    </tr>
                </thead>
                <tbody>
                    {{ $tableBody }}
                </tbody>
            </table>
        </div>

        {{ $paginationLinks }}

    </div>
</div>
