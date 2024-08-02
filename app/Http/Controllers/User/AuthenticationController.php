<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Validator
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    public function signinPage()
    {
        if (Auth::check()) {
            return redirect()->route('user.varietyReport.overviewPage');
        }
        return view('User.signin');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $validation = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        $validator = Validator::make($credentials, $validation);

        if ($validator->fails()) {
            Session::flash('validation_flash_error', 'required');
            return redirect()->back()->withInput()->withErrors($validator->messages());
        }

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $user = Auth::user();
            $user->last_login = Carbon::now();
            $user->save();

            switch (Auth::user()->role) {
                case 'admin':
                    return redirect()->route('admin.dashboardPage');
                case 'user':
                    return redirect()->route('user.varietyReport.overviewPage');
                case 'grower':
                    return redirect()->route('user.varietyReport.overviewPage');
                case 'breeder':
                    return redirect()->route('user.varietyReport.overviewPage');
                default:
                    return redirect()->route('login')->with('error', 'Role not recognized.');
            }
        } else {
            Session::flash('login_flash_error', 'invalid_credential');
            return redirect()->back()->withInput()->withErrors("The Email or the password is invalid. Please try again.");
        }

    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
        }
        return redirect()->route('user.signinPage');
    }
}
