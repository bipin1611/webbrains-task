<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use DataTables;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::latest()->get();

        if (request()->ajax()) {

            return Datatables::of($customers)
                ->addIndexColumn()

                ->addColumn('id', function($row){

                    $input = '<input type="checkbox" value="'.$row->id.'" name="customer">';

                    return $input;
                })
                ->addColumn('status', function($row){

                    if($row->status == 'active'){
                        // Add button to change status
                        $status = '<button class="button is-small is-primary" onclick="changeStatus('.$row->id.')">Active</button>';

                    }else{
                        // Add button to change status
                        $status = '<button class="button is-small is-danger" onclick="changeStatus('.$row->id.')">Inactive</button>';
                    }

                    return $status;
                })
                ->addColumn('action', function($row){

                    $btn = '<a href="'. route('admin.customers.edit', $row->id) .'"  class="button is-small is-primary mr-2">Edit</a>';
                    $btn .= '<a onclick="deleteRecord('.$row->id.')" class="button is-small is-danger">Delete</a>';

                    return $btn;
                })
                ->rawColumns(['action', 'id', 'status'])
                ->make(true);
        }

        return view('admin.customers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customers.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:customers',
            'password' => 'required|min:6',
        ]);

        $user = new Customer();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = \Hash::make($request->password);
        $user->save();

        return redirect()->route('admin.customers')->with('success','Customer Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('admin.customers.edit', [
            'customer' => $customer
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:customers,email,'.$customer->id,
            'password' => 'nullable|min:6',
        ]);

        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        if($request->password){
            $customer->password = Hash::make($request->password);
        }
        $customer->save();

        return redirect()->route('admin.customers')->with('success','Customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $ids = $request->customers;

        Customer::whereIn('id', $ids)->delete();

        return true;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Customer $customer)
    {

        if($customer->status == 'active'){
            $customer->status = 'inactive';
        }else{
            $customer->status = 'active';

        }
        $customer->save();

        return true;

    }
}
