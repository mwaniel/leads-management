<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salesperson;

class SalespersonController extends Controller
{
    public function index()
    {
        $salespersons = Salesperson::all();
        return view('salespersons.index', compact('salespersons'));
    }

    public function create()
    {
        return view('salespersons.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'salesname' => 'required|string',
            'travelspirit_id' => 'nullable|integer',
            'calendlylink' => 'nullable|string',
        ]);

        Salesperson::create($request->all());
        return redirect()->route('salespersons.index')->with('success', 'Salesperson created successfully.');
    }

    public function show(Salesperson $salesperson)
    {
        return view('salespersons.show', compact('salesperson'));
    }

    public function edit(Salesperson $salesperson)
    {
        return view('salespersons.edit', compact('salesperson'));
    }

    public function update(Request $request, Salesperson $salesperson)
    {
        $request->validate([
            'salesname' => 'required|string',
            'travelspirit_id' => 'nullable|integer',
            'calendlylink' => 'nullable|string',
        ]);

        $salesperson->update($request->all());
        return redirect()->route('salespersons.index')->with('success', 'Salesperson updated successfully.');
    }

    public function destroy(Salesperson $salesperson)
    {
        $salesperson->delete();
        return redirect()->route('salespersons.index')->with('success', 'Salesperson deleted successfully.');
    }
}
