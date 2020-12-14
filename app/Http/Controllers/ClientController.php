<?php

namespace App\Http\Controllers;

use App\Client;
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
        $clients = Client::all();
        return view('client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = new Client();
        return view('client.create', compact('client'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request = request()->validate([
            "name" => "required",
            "email" => "required",
            "password" => "required",
            "password_confirmation" => "required",
            "age" => "required",
            "adresse" => "required",
            "tel_mobile" => "required",
            "tel_fixe" => "required",
            "sport_pref" => "required",
            "montant_max" => "required",
        ]);

        Client::create($request);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $Client)
    {
        return view('client.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $Client)
    {
        return view('client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $Client)
    {
        $request = request()->validate([
            "name" => "required",
            "email" => "required",
            "password" => "required",
            "password_confirmation" => "required",
            "age" => "required",
            "adresse" => "required",
            "tel_mobile" => "required",
            "tel_fixe" => "required",
            "sport_pref" => "required",
            "montant_max" => "required",
        ]);

        $Client->update($request);

        return redirect('Clients/' . $Client->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $Client)
    {
        $Client->delete();
        return redirect('Clients');
    }
}
