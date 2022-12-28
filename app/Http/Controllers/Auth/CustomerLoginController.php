<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return view('customer-profile');

    }

    /**
     * Show Customer login form
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {

        return view('customer-auth.login');
    }


    /**
     * Login Customer.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {

        if (Customer::where('email', $request->email)->exists()) {
            $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);

            $user_auth = \Auth::guard('customer')
                ->attempt([
                    'email' => $request->email,
                    'password' => $request->password
                ]);

            if ($user_auth) {
                return redirect()->route('customer.profile')->with('success', 'Login Success');
            }else{
                return redirect()->back()->with('error', 'Invalid Credentials');
            }

        } else {
            return redirect()->back()->with('error', 'Please Enter Valid Email ID.');
        }

    }



    /**
     * Logout admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {

        \Auth::guard('customer')->logout();

        return redirect()->route('customer.logout');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
