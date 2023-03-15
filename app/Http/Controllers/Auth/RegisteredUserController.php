<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Event;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $events = Event::all();
        return view('register', ['events' => $events]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'birth_date' => ['required'],
            'address' => ['required'],
            'event_id' => ['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'birth_date' => $request->birth_date,
            'event_id' => $request->event_id,
            'password' => Hash::make('peserta'),
            'role_id' => 2
        ]);

        session(['success' => 'Pendaftaran peserta berhasil.']);
        return redirect('register');
    }
}
