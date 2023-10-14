@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <div class="bg-white shadow-md rounded p-3">
            <h1 class="h2 mb-4">Edit Diesel Consumption</h1>
            <form action="{{ route('diesel-consumption.update', ['id'=>$entry->id]) }}" method="POST">
                @csrf
                @method('POST')

                <!-- Date Input -->
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" name="date" class="form-control" value="{{ $entry->date }}">
                </div>

                <!-- Tank Capacity Input -->
                <div class="form-group">
                    <label for="tank_capacity">Tank Capacity (in liters or gallons)</label>
                    <input type="number" name="tank_capacity" class="form-control" value="{{ $entry->tank_capacity }}">
                </div>

                <!-- Diesel Purchased Input -->
                <div class="form-group">
                    <label for="diesel_purchased">Diesel Purchased (in liters or gallons)</label>
                    <input type="number" name="diesel_purchased" class="form-control" value="{{ $entry->diesel_purchased }}">
                </div>

                <!-- Save Changes Button -->
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>
@endsection
