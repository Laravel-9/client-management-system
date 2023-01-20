<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::latest()->get();
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $this->validate($request,[            
            'contact_name' => ['required', 'string', 'max:255'],
            'contact_email' =>['required', 'string', 'email', 'max:255', 'unique:clients'],
            'contact_phone_number' => ['required', 'string', 'numeric', 'digits:10', 'unique:clients'],
            'company_name' => ['required', 'string', 'max:255'],
            'company_address' => ['required', 'string', 'max:255'],
            'company_city' => ['required', 'string', 'max:255'],
            'company_zip' => ['required', 'numeric', 'digits:6'],
            'company_vat' => ['required', 'numeric'],
        ], [], $this->attributes());
        $client = Client::create($validated);
        return redirect()->route('clients.index')->with('success','Client has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $validated = $this->validate($request,[            
            'contact_name' => ['required', 'string', 'max:255'],
            'contact_email' =>['required', 'string', 'email', 'max:255', 'unique:clients,contact_email,'.$client->id],
            'contact_phone_number' => ['required', 'string', 'numeric', 'digits:10', 'unique:clients,contact_phone_number,'.$client->id],
            'company_name' => ['required', 'string', 'max:255'],
            'company_address' => ['required', 'string', 'max:255'],
            'company_city' => ['required', 'string', 'max:255'],
            'company_zip' => ['required', 'numeric', 'digits:6'],
            'company_vat' => ['required', 'numeric'],
        ], [], $this->attributes());
        $client->update($validated);
        return redirect()->route('clients.index')->with('success','Client has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index')->with('success','Client has been deleted successfully.');
    }

    public function attributes()
    {
        return [
            'contact_name' => 'Name',
            'contact_email' => 'Email',
            'contact_phone_number' => 'Phone Number',
        ];
    }
}
