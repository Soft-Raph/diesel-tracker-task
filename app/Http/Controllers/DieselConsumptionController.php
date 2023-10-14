<?php

namespace App\Http\Controllers;

use App\Charts\DieselConsumptionChart;
use App\Models\DieselConsumption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DieselConsumptionController extends Controller
{


    public function create()
    {
        $dieselConsumptions = DieselConsumption::all();
        $chart = new DieselConsumptionChart;
//        $chart->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']);
//        $chart->dataset('Diesel Consumption (Liters)', 'line', [1, 2, 3, 4]);
        return view('diesel.create', compact('chart', 'dieselConsumptions'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'tank_capacity' => 'required|numeric',
            'diesel_purchased' => 'required|numeric',
        ]);
        $dieselConsumption = new DieselConsumption();
        $dieselConsumption->date = $validatedData['date'];
        $dieselConsumption->tank_capacity = $validatedData['tank_capacity'];
        $dieselConsumption->diesel_purchased = $validatedData['diesel_purchased'];
        $dieselConsumption->user_id = auth()->id(); // Set the user ID

        $dieselConsumption->save();

        return redirect('/')->with('success', 'Diesel consumption data saved.');
    }

    public function edit(Request $request)
    {
        $entry = DieselConsumption::query()->find($request->id);
        return view('diesel.edit', compact('entry'));
    }

    public function update(Request $request)
    {
        // Validate and update the diesel consumption data
        $request->validate([
            'date' => 'required|date',
            'tank_capacity' => 'required|numeric',
            'diesel_purchased' => 'required|numeric',
        ]);
        $dieselConsumption = DieselConsumption::query()->find($request->id);
        $dieselConsumption->update($request->all());

        return redirect()->route('home')
            ->with('success', 'Diesel consumption entry updated successfully.');
    }

    public function destroy(Request $request)
    {
        $dieselConsumption = DieselConsumption::query()->find($request->id);

        $dieselConsumption->delete();

        return redirect()->route('home')
            ->with('success', 'Diesel consumption entry deleted successfully.');
    }
}
