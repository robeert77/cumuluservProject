@extends('layouts.app')

@section('content')
<div class="row justify-content-evenly my-5">
    <div class="col-lg-12 my-5 my-lg-0 card-shadow bg-white rounded">
        <div class="title-header pt-3 pb-1">
            <h3 class="font-weight-normal">Clienți</h3>
        </div>
        <table class="table table-striped table-hover mb-5">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nume</th>
                    <th scope="col">Tip companie</th>
                    <th scope="col">Status</th>
                    <th scope="col">Contract colaborare</th>
                    <th scope="col">Telefon</th>
                    <th scope="col">Email</th>
                    <th scope="col">Actiuni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                    <tr>
                        <th scope="row">{{ $company->id }}</th>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->type }}</td>
                        <td>{{ $company->status }}</td>
                        <td>{{ $company->contract ? 'Da' : 'Nu' }}</td>
                        <td>{{ $company->phone }}</td>
                        <td>{{ $company->email }}</td>
                        <td class="d-flex align-items-center gap-2">
                            <a href="{{ route('companies.edit', $company->id) }}" class="btn"><x-icon name="pencil" color="primary"></x-icon></a>
                            <form action="{{ route('companies.destroy', $company->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this company?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn"><x-icon name="trash3" color="danger"></x-icon></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $companies->links() }}
    </div>
</div>
@endsection
