<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function creer(Request $request){
        Client::create([
            'nom' => $request->nom,
            'email' => $request->email,
            'tel' => $request->tel,
            'fax' => $request->fax,
            'adresse' => $request->adresse,
            'patente' => $request->patente,
            'rc' => $request->rc,
            'ice' => $request->ice
        ]);
        return response()->json(['type' => 'success', 'message' => 'Le client a été bien crée.']);
    }
}
