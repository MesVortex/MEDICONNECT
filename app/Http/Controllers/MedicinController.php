<?php

namespace App\Http\Controllers;

use App\Models\Medicin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MedicinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'MedicinName' => ['required', 'string', 'max:255'],
            'MedicinPrice' => ['required', 'integer'],
            'Speciality' => ['required'],
        ]);

        $newMedicin = Medicin::create([
            'name' => $validatedData['MedicinName'],
            'price' => $validatedData['MedicinPrice'],
            'specialityID' => $validatedData['Speciality'],
        ]);

        return redirect()->back()->with('success', 'Medication added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Medicin $medicin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medicin $medicin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medicin $medicin)
    {
        $validatedData = $request->validate([
            'newMedicinName' => ['required', 'string', 'max:255'],
            'newMedicinPrice' => ['required', 'integer'],
            'newSpeciality' => ['required'],
        ]);

        $medicin->update([
            'name' => $validatedData['newMedicinName'],
            'price' => $validatedData['newMedicinPrice'],
            'specialityID' => $validatedData['newSpeciality'],
        ]);

        return redirect()->back()->with('success', 'Medication updated successfully!');
        
    }

    /**
     * Archive the specified resource from storage.
     */
    public function Archive(Medicin $medicin)
    {
        if($medicin->status == 1){
            $medicin->update([
                'status' => 0
            ]);
        }else{
            $medicin->update([
                'status' => 1
            ]);
        }
        
        return redirect()->back()->with('success', 'Medication deleted successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medicin $medicin)
    {
        //
    }
}
