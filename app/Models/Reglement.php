<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reglement extends Model
{
    use HasFactory;
    protected $table = 'reglements';
    /**
     * @var array
     */
    protected $fillable = ['code', 'libelle'];
}
