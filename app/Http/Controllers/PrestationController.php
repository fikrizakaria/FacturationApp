<?php

namespace App\Http\Controllers;

use App\Models\Prestation;
use Illuminate\Http\Request;

class PrestationController extends Controller
{
    public function creer(Request $request)
    {
        Prestation::create([
            'code' => $request->code,
            'libelle' => $request->libelle
        ]);
        return response()->json(['type' => 'success', 'message' => 'La prestation a été bien crée.']);
    }
}
