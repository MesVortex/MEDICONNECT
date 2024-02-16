<?php

namespace App\Http\Controllers;

use App\Models\Appointement;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class AppointementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function emergency()
    {
        $appointements = DB::table('appointements')
            ->join('doctors', 'doctors.id', '=', 'appointements.doctorID')
            ->join('specialities', 'specialities.id', '=', 'doctors.specialityID')
            ->join('users', 'users.id', '=', 'doctors.userID')
            ->select('appointements.*', 'specialities.name', 'users.name')
            ->where('specialities.name', 'General')
            ->where('appointements.status', 0)
            ->get();
        return view('patient.emergency', compact('appointements'));
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
            '8:00 AM',
            '9:00 AM',
            '10:00 AM',
            '11:00 AM',
            '2:00 PM',
            '3:00 PM',
            '4:00 PM',
            '5:00 PM',
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
