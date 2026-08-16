<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alerte extends Model
{
    use HasFactory;

    protected $table = 'alertes';

    protected $primaryKey = 'id';

    /**
     * Attributs pouvant être remplis en masse.
     */
    protected $fillable = [
        'eleve_id',
        'etablissement_id',
        'type_alerte',
        'description',
        'niveau_gravite',
        'statut',
    ];

    /**
     * Un modèle Alerte appartient à un élève.
     */
    public function eleve()
    {
        return $this->belongsTo(
            Eleve::class,
            'eleve_id',
            'id'
        );
    }

    /**
     * Une alerte est signalée par un établissement.
     */
    public function etablissement()
    {
        return $this->belongsTo(
            Etablissement::class,
            'etablissement_id',
            'id'
        );
    }
}

