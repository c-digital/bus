<?php

namespace App\Controllers;

use App\Models\Customer;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('Auth');
    }
    
    public function index()
    {
        $customers = Customer::get();
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store()
    {
        Customer::create([
            'name' => request('name'),
            'ci' => request('ci'),
            'date_birth' => request('date_birth'),
            'age' => request('age'),
            'phone' => request('phone'),
            'address' => request('address')
        ]);

        return redirect('/customers')->with('info', 'Cliente creado satisfactoriamente');
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('customers.edit', compact('customer'));
    }

    public function update()
    {
        $customer = Customer::find(request('id'));
        $customer->update([
            'name' => request('name'),
            'ci' => request('ci'),
            'date_birth' => request('date_birth'),
            'age' => request('age'),
            'phone' => request('phone'),
            'address' => request('address')
        ]);

        return redirect('/customers')->with('info', 'Cliente editado satisfactoriamente');
    }

    public function delete($id)
    {
        Customer::find($id)
            ->delete();

        return redirect('/customers')
            ->with('info', 'Cliente eliminado satisfactoriamente');
    }

    public function info()
    {
        $customer = Customer::where('ci', request('ci'))->first();
        return $customer;
    }    
}
