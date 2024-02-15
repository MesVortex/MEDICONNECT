<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\AppointementController;
use App\Http\Controllers\Controller;
use App\Models\Appointement;
use App\Models\User;
use App\Models\Speciality;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $specialities = Speciality::all();
        return view('auth.register', compact('specialities'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'in:doctor,patient'],
            'specialityID' => ['required_if:role, doctor'],
        ]);
       
        $user = User::create([
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($validatedData['role'] === 'doctor') {
            if(isset($validatedData['specialityID'])){
                $user->doctor()->create([
                    'userID' => $user->id,
                    'specialityID' => $validatedData['specialityID']
                ]);

                $newAppointements = new AppointementController();

                $newAppointements->store($user->id);
            }else{
                return back()->withInput()->withErrors(['speciality' => 'Please choose your speciality.']);
            }
        }

        if ($validatedData['role'] === 'patient') {
            $user->patient()->create([
                'userID' => $user->id
            ]);
        }

        event(new Registered($user));

        Auth::login($user);

        return $request->role == 'doctor' ? redirect('/doctor/index') : redirect('/patient/index');
    }
}
