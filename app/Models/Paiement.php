<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;
    protected $table = 'paiements';
    /**
     * @var array
     */
    protected $fillable = ['id', 'idClient', 'idFacture', 'date', 'montant', 'credit', 'description', 'type', 'devise', 'reference', 'compte', 'importe'];
}
