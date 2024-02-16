<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Appointement;
use App\Models\Review;
use Illuminate\Http\Request;

class DoctorController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        $reviews = Doctor::find($doctor->id)->review;
        $averageReviewCount = Review::where('doctorID', $doctor->id)->avg('starCount');
        return view('patient.doctorPage', compact('doctor', 'reviews', 'averageReviewCount'));
    }

    public function showAppointements(Doctor $doctor)
    {
        $appointements = Doctor::find($doctor->id)->appointement;
        return view('patient.appointementBooking', compact('doctor', 'appointements'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}
