<!-- resources/views/diesel/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Diesel Consumption</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" name="date" class="form-control @error('date') is-invalid @enderror">
                                @error('date')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tank_capacity">Tank Capacity (in liters or gallons)</label>
                                <input type="number" name="tank_capacity" class="form-control @error('tank_capacity') is-invalid @enderror">
                                @error('tank_capacity')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="diesel_purchased">Diesel Purchased (in liters or gallons)</label>
                                <input type="number" name="diesel_purchased" class="form-control @error('diesel_purchased') is-invalid @enderror">
                                @error('diesel_purchased')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- You can add more fields here if needed -->
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
            <div class="container mx-auto p-4">
                <div class="bg-white shadow p-3 rounded mb-4">
                    <h1 class="h2 mb-4">Diesel Consumption Entries</h1>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Tank Capacity</th>
                                <th>Diesel Purchased</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($dieselConsumptions as $entry)
                                <tr>
                                    <td>{{ $entry->date }}</td>
                                    <td>{{ $entry->tank_capacity }} liters/gallons</td>
                                    <td>{{ $entry->diesel_purchased }} liters/gallons</td>
                                    <td>
                                        <a href="{{ route('diesel-consumption.edit', ['id'=>$entry->id]) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('diesel-consumption.destroy', ['id'=>$entry->id]) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('POST')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this entry?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

    </div>

    <div class="container mx-auto p-4">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h1 class="text-2xl font-bold mb-4">The Statistics Chart</h1>
            <div class="mb-4">
                {!! $chart->container() !!}
            </div>
        </div>
    </div>

    @push('scripts')
        {!! $chart->script() !!}
    @endpush
@endsection
