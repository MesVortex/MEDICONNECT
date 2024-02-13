<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SpecialityController extends Controller
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
            'SpecialityName' => ['required', 'string', 'max:255'],
        ]);

        $newSpeciality = Speciality::create([
            'name' => $validatedData['SpecialityName']
        ]);

        return Redirect::route('admin.dashboard')->with('status', 'Speciality Added Succesfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Speciality $speciality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Speciality $speciality)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Speciality $speciality)
    {
        $validatedData = $request->validate([
            'newSpecialityName' => ['required', 'string', 'max:255'],
        ]);

        $speciality->update([
            'name' => $validatedData['newSpecialityName']
        ]);

        return Redirect::route('admin.dashboard')->with('status', 'Speciality Updated Succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Speciality $speciality)
    {
        $speciality->delete();

        return Redirect::route('admin.dashboard')->with('status', 'Speciality Deleted Succesfully!');
    }
}
