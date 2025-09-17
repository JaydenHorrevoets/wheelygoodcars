@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <h2>Mijn aangeboden auto's</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Kenteken</th>
                <th>Merk</th>
                <th>Model</th>
                <th>Bouwjaar</th>
                <th>Prijs</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @forelse($cars as $car)
            <tr>
                <td>{{ $car->license_plate }}</td>
                <td>{{ $car->merk }}</td>
                <td>{{ $car->model }}</td>
                <td>{{ $car->bouwjaar }}</td>
                <td>€{{ number_format($car->price, 2, ',', '.') }}</td>
                <td>
                    <form action="{{ route('cars.destroy', $car) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Weet je zeker dat je deze auto wilt verwijderen?')">Verwijderen</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Je hebt nog geen auto's aangeboden.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <a href="{{ route('cars.create') }}" class="btn btn-primary">Nieuwe auto aanbieden</a>
</div>
@endsection
