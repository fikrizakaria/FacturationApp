<?php

namespace App\Http\Controllers;

use App\Models\Reglement;
use Illuminate\Http\Request;

class ReglementController extends Controller
{
    public function creer(Request $request)
    {
        Reglement::create([
            'code' => $request->code,
            'libelle' => $request->libelle
        ]);
        return response()->json(['type' => 'success', 'message' => 'Le réglement a été bien crée.']);
    }
}
