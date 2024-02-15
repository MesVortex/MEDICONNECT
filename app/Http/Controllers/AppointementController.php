<?php

namespace App\Http\Controllers;

use App\Models\Appointement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AppointementController extends Controller
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
    public function store(int $doctorID)
    {
        $bookingHours = [
            '8:00',
            '9:00',
            '10:00',
            '11:00',
            '2:00',
            '3:00',
            '4:00',
            '5:00',
        ];

        $appointement = new Appointement();

        foreach ($bookingHours as $time) {
            $appointement->create([
                'bookingHour' => $time,
                'date' => now(),
                'doctorID' => $doctorID,
                'status' => 0,
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointement $appointement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointement $appointement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'appointementID' => ['required', 'integer'],
            'patientID' => ['required', 'integer'],
        ]);

        $appointement = Appointement::findOrFail($validatedData['appointementID']);

        $appointement->update([
            'patientID' => $validatedData['patientID'],
            'status' => 1,
        ]);

        return redirect()->back()->with('success', 'Appointement Booked!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointement $appointement)
    {
        //
    }
}
