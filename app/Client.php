<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nom
 * @property string $email
 * @property string $tel
 * @property string $fax
 * @property string $adresse
 * @property string $patente
 * @property string $rc
 * @property string $ice
 */
class Client extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'client';

    /**
     * @var array
     */
    protected $fillable = ['nom', 'email', 'tel', 'fax', 'adresse', 'patente', 'rc', 'ice'];

}
