<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultatScolaire extends Model
{
    use HasFactory;

    protected $table = 'resultats_scolaires';

    protected $primaryKey = 'id';

    /**
     * Attributs pouvant être remplis en masse.
     */
    protected $fillable = [
        'inscription_id',
        'moyenne_generale',
        'rang',
        'decision',
        'observation',
    ];

    /**
     * Conversion des attributs.
     */
    protected function casts(): array
    {
        return [
            'moyenne_generale' => 'decimal:2',
            'rang' => 'integer',
        ];
    }

    /**
     * Un résultat scolaire appartient à une inscription.
     */
    public function inscription()
    {
        return $this->belongsTo(
            Inscription::class,
            'inscription_id',
            'id'
        );
    }
}
