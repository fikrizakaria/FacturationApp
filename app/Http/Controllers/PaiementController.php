<?php

namespace App\Http\Controllers;

use App\Client;
use App\Models\Facture;
use App\Models\Paiement;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
    public function creer(Request $request)
    {
        $paiement=Paiement::where('idFacture','=',$request->idFacture)->orderBy('date', 'desc')->first();
        if($paiement){
            Paiement::create([
                'idClient' => $request->idClient,
                'idFacture' => $request->idFacture,
                'compte' => $request->compte,
                'devise' => $request->devise,
                'reference' => $request->reference,
                'description' => $request->description,
                'date' => $request->date,
                'montant' => $paiement->montant-$request->credit,
                'credit' => $request->credit+ $paiement->credit,
                'mode' => $request->mode
            ]);
        }
        else{
            Paiement::create([
                'idClient' => $request->idClient,
                'idFacture' => $request->idFacture,
                'compte' => $request->compte,
                'devise' => $request->devise,
                'reference' => $request->reference,
                'description' => $request->description,
                'date' => $request->date,
                'montant' => $request->montant,
                'credit' => $request->credit,
                'mode' => $request->mode
            ]);
        }
        
        return response()->json(['type' => 'success', 'message' => 'Le paiement a été créé avec succès']);
    }

    public function getFacturesCompte(Request $request)
    {
        if($request->has('importe')) $check=1;
        else $check=0;
        $data = Facture::where('factures.idClient', $request->client)->whereDate('dateFacturation', '>=', date($request->du))->whereDate('dateFacturation', '<=', date($request->au))->where('importe','=',$check)
            ->leftJoin('paiements', 'factures.id', '=', 'paiements.idFacture')
            ->select('factures.id', 'date', 'montant', 'credit')
            ->get();
        $clients = Client::select('id', 'nom')->get();
        return view('facturation.compte', ['data' => $data, 'clients' => $clients]);
    }
    public function importData(Request $request){
        $data= json_decode($request->data, true);
        foreach ($data as $item) {
            Paiement::create([
                'idClient' => $item[0],
                'idFacture' => $item[1],
                'devise' => $item[5],
                'reference' => $item[8],
                'description' => $item[6],
                'date' => $item[2],
                'montant' => $item[3],
                'credit' => $item[4],
                'mode' => $item[7],
                'importe' => 1
            ]);
        }
        return response()->json(['type' => 'success', 'message' => 'Les données sont importés avec succès']);
    }
}
