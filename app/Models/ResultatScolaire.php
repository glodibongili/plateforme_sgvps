<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultatScolaire extends Model
{
    use HasFactory;

    protected $table = 'resultats_scolaires';

    protected $primaryKey = 'id';

    protected $fillable = [
        'inscription_id',
        'moyenne_generale',
        'rang',
        'decision',
        'observation',
    ];

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

    /**
     * Un résultat scolaire possède plusieurs bulletins.
     */
    public function bulletins()
    {
        return $this->hasMany(
            Bulletin::class,
            'resultat_scolaire_id',
            'id'
        );
    }
}
