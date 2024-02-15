<?php

namespace App\Http\Controllers;

use App\Models\Appointement;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Speciality;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role === 'patient') {
            $specialities = Speciality::all();
            return view('patient.index', compact('specialities'));
        }
        return redirect('/');
    }

    public function explore(Speciality $speciality)
    {
        if (auth()->user()->role === 'patient') {
            $doctors = Speciality::find($speciality->id)->doctor;
            return view('patient.explore', compact('doctors'));
        }
        return redirect('/');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
