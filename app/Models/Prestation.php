<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestation extends Model
{
    use HasFactory;
    protected $table = 'prestation';
    /**
     * @var array
     */
    protected $fillable = ['code','libelle'];
}
