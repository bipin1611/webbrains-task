<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show Admin login form
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {

        return view('admin.login');
    }


    /**
     * Login Admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {

        if (Admin::where('email', $request->email)->exists()) {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            $user_auth = \Auth::guard('admin')
                ->attempt([
                    'email' => $request->email,
                    'password' => $request->password
                ]);

            if ($user_auth) {
                return redirect()->route('admin.customers')->with('success', 'Login Success');
            }else{
                return redirect()->back()->with('error', 'Invalid Credentials');
            }

        } else {
            return back()->with('error', 'Please Enter Valid Email ID.');
        }

    }



    /**
     * Logout admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {

        \Auth::guard('admin')->logout();

        return redirect()->route('admin.login');
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
