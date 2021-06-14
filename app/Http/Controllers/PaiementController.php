<?php

namespace App\Http\Controllers;

use App\Models\Paiement;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
    public function creer(Request $request)
    {
        Paiement::create([
            'idClient' => $request->idClient,
            'idFacture' => $request->idFacture,
            'compte' => $request->compte,
            'devise' => $request->devise,
            'reference' => $request->reference,
            'description' => $request->description,
            'date' => $request->date,
            'montant' => $request->montant,
            'mode' => $request->mode
        ]);
        return response()->json(['type' => 'success', 'message' => 'Le paiement a été bien crée.']);
    }
}
