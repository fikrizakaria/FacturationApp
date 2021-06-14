<?php

namespace App\Http\Controllers;

use App\Client;
use App\Mail\envoiFacture;
use App\Models\Facture;
use App\Models\Paiement;
use App\Models\Prestation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FactureController extends Controller
{
    
    public function index(){
        $clients= Client::select('id', 'nom')->get();
        $prestations = Prestation::select('id', 'libelle')->get();
        return view('facturation.creer',['clients'=>$clients, 'prestations' => $prestations]);
    }
    public function creer(Request $request)
    {
        Facture::create([
            'idClient' => $request->idClient,
            'client' => $request->client,
            'dateFacturation' => $request->dateFacturation,
            'dateEcheance' => $request->dateEcheance,
            'numeroFacture' => $request->numeroFacture,
            'numeroCommande' => $request->numeroCommande,
            'articles' => $request->articles,
            'prixHT' => $request->prixHT,
            'prixTTC' => $request->prixTTC
        ]);
        return response()->json(['type' => 'success', 'message' => 'La facture a été bien crée.']);
    }
    public function liste()
    {
        $factures = Facture::select('id', 'client', 'numeroFacture', 'prixTTC', 'dateFacturation', 'dateEcheance')->get();
        return view('facturation.factures', ['factures' => $factures]);
    }
    public function details($id)
    {
        $facture = Facture::where('factures.id', $id)
        ->leftJoin('client', 'factures.idClient', '=', 'client.id')
        ->select('factures.id', 'idClient', 'numeroFacture', 'prixHT', 'prixTTC', 'dateFacturation', 'dateEcheance', 'articles', 'numeroCommande', 'nom', 'adresse', 'tel', 'fax', 'email', 'patente', 'envoye')
        ->get();
        $envoye='non';
        foreach ($facture as $fac) {
            $fac->articles=json_decode($fac->articles);
            $fac->prixHT=explode(" DH", $fac->prixHT)[0];
            $fac->prixTTC = explode(" DH", $fac->prixTTC)[0];
            $envoye=$fac->envoye;
        }
        $paye=Paiement::where('idFacture', $id)->get();
        if($paye){
            return view('facturation.factureDetail', ['facture' => $facture, 'paye'=>'oui', 'envoye'=>$envoye]);
        }
        else {
            return view('facturation.factureDetail', ['facture' => $facture, 'paye' => 'non']);
        }
        
    }
    public function envoi($id){
        $facture = Facture::where('factures.id', $id)
        ->leftJoin('client', 'factures.idClient', '=', 'client.id')
        ->select('factures.id', 'idClient', 'numeroFacture', 'prixHT', 'prixTTC', 'dateFacturation', 'dateEcheance', 'articles', 'numeroCommande', 'nom', 'adresse', 'tel', 'fax', 'email', 'patente')
        ->get();
        $email="";
        foreach ($facture as $fac) {
            $fac->articles = json_decode($fac->articles);
            $fac->prixHT = explode(" DH", $fac->prixHT)[0];
            $fac->prixTTC = explode(" DH", $fac->prixTTC)[0];
            $email=$fac->email;
        }
        return Mail::to($email)->send(new envoiFacture($facture));
    }
    public function delete($id)
    {
        Facture::find($id)->delete();
        return redirect('/facturation/factures');
    }
}
