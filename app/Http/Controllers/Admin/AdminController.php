<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function login(Request $request)
    {
        // echo $password = Hash::make('123456'); die;
        if ($request->isMethod('post')) {
            $data = $request->all();
            // echo '<pre>'; print_r($data); die;

            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required'
            ];

            $customMessages = [
                // Add custom messages here
                'email.required' => 'Email is required!',
                'email.email' => 'Valid Email is required!',
                'password.required' => 'Password is required!',
            ];

            $this->validate($request, $rules, $customMessages);

            if (Auth::guard('admin')->attempt(
                [
                    'email' => $data['email'],
                    'password' => $data['password'],
                    'status' => 1
                ]
            )) {
                return redirect('admin/dashboard');
            } else {
                return redirect()->back()->with('error_message', 'Invalid Email or Password');
            }
        }

        return view('admin.login');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
}
