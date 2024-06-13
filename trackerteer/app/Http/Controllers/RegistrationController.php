<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller
{
    public function showForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|string|email|max:255|unique:users',
            'user_telephone' => 'required|integer',
            'user_addr1' => 'required|string|max:255',
            'user_addr2' => 'nullable|string|max:255',
            'user_city' => 'required|string|max:255',
            'user_state' => 'required|string|max:255',
            'user_zip_code' => 'required|integer|max:9999',
            'user_username' => 'required|string|max:255|unique:users',
            'user_password' => 'required|string|min:8',
            'confirm_password' => 'required|string|min:8|same:user_password'
        ]);

        if ($validator->fails()) {
            return redirect()->route('register.form')
                             ->withErrors($validator)
                             ->withInput();
        }

        $user = User::create([
            'user_name' => $request->name,
            'user_email' => $request->email,
            'user_telephone' => $request->telephone,
            'user_addr1' => $request->address_1,
            'user_addr2' => $request->address_2,
            'user_city' => $request->city,
            'user_state' => $request->state,
            'user_zip_code' => $request->zip_code,
            'user_username' => $request->username,
            'user_password' => Hash::make($request->password),
        ]);

        Mail::raw('Thank you for registering!', function ($message) use ($user) {
            $message->to($user->email)
                    ->subject('Registration Confirmation');
        });

        return redirect()->route('congratulations')->with('name', $user->name);
    }
}
