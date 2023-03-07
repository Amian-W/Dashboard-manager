<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->view('clients.index', [
            'clients' => Client::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('clients.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'raison_sociale' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            ]);

            Client::create($request->all());
       
            return redirect()->route('clients.index')
                            ->with('success','Client created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return view('clients.show',compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) : Response
    {
        return response()->view('clients.form', [
            'client' => Client::findOrFail($id),
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'raison_sociale' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
      
        $client->update($request->all());
      
        return redirect()->route('clients.index')
                        ->with('success','Client updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *@param  \App\Models\client  $client
     *@return \Illuminate\Http\Response
    **/
    public function destroy(Client $client)
    {
        $client->delete();
       
        return redirect()->route('clients.index')
                        ->with('success','Client deleted successfully');
    }
}
