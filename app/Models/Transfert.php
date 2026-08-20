<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfert extends Model
{
    use HasFactory;

    protected $table = 'transferts';

    protected $primaryKey = 'id';

    /**
     * Attributs pouvant être remplis en masse.
     */
    protected $fillable = [
        'eleve_id',
        'etablissement_origine_id',
        'etablissement_destination_id',
        'date_transfert',
        'motif',
        'statut',
    ];

    /**
     * Conversion des attributs.
     */
    protected function casts(): array
    {
        return [
            'date_transfert' => 'date',
        ];
    }

    /**
     * Un transfert concerne un élève.
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
     * Un transfert appartient à un établissement d'origine.
     */
    public function etablissementOrigine()
    {
        return $this->belongsTo(
            Etablissement::class,
            'etablissement_origine_id',
            'id'
        );
    }

    /**
     * Un transfert appartient à un établissement de destination.
     */
    public function etablissementDestination()
    {
        return $this->belongsTo(
            Etablissement::class,
            'etablissement_destination_id',
            'id'
        );
    }
}
