<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\SendMailController;
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
            'user_tel' => 'required|integer',
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
            'user_name' => $request->user_name,
            'user_email' => $request->user_email,
            'user_tel' => $request->user_tel,
            'user_addr1' => $request->user_addr1,
            'user_addr2' => $request->user_addr2,
            'user_city' => $request->user_city,
            'user_state' => $request->user_state,
            'user_zip_code' => $request->user_zip_code,
            'user_username' => $request->user_username,
            'user_password' => Hash::make($request->user_password),
        ]);

        $mailer = new SendMailController();
        $mailer->send_registration_email($request->user_email, $request->user_name);

        return redirect()->route('congratulations')->with('name', $user->user_name);
    }
}
