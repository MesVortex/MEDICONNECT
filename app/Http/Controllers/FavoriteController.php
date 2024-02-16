<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller{

    // public function index()
    // {
    //     //
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store($doctorId)
    {
        {
            
            $patientId = Auth::user()->patient->id;
            $exists = Favorite::where('doctor_id', $doctorId)->where('patient_id', $patientId)->exists();
    
            if (!$exists) {
                Favorite::create([
                    'doctor_id' => $doctorId,
                    'patient_id' => $patientId,
                ]);
            }
    
            return back()->with('success', 'Docteur ajouté aux favoris');
        }

    }

//     /**
//      * Display the specified resource.
//      */
//     public function show(Favorite $favorite)
//     {
//         //
//     }

//     /**
//      * Show the form for editing the specified resource.
//      */
//     public function edit(Favorite $favorite)
//     {
//         //
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(Request $request, Favorite $favorite)
//     {
//         //
//     }

//     /**
//      * Remove the specified resource from storage.
//      */
    public function destroy($doctorId)
    {
        $patientId = Auth::user()->patient->id;
        Favorite::where('doctor_id', $doctorId)->where('patient_id', $patientId)->delete();
        return back()->with('success', 'Docteur retiré des favoris');
    }
// }
}