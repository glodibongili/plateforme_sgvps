<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;

    protected $table = 'inscriptions';

    protected $primaryKey = 'id';

    /**
     * Attributs pouvant être remplis en masse.
     */
    protected $fillable = [
        'eleve_id',
        'etablissement_id',
        'classe_id',
        'annee_scolaire_id',
        'numero_inscription',
        'date_inscription',
        'statut',
    ];

    /**
     * Conversion des attributs.
     */
    protected function casts(): array
    {
        return [
            'date_inscription' => 'date',
        ];
    }

    /**
     * Une inscription appartient à un élève.
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
     * Une inscription appartient à un établissement.
     */
    public function etablissement()
    {
        return $this->belongsTo(
            Etablissement::class,
            'etablissement_id',
            'id'
        );
    }

    /**
     * Une inscription appartient à une classe.
     */
    public function classe()
    {
        return $this->belongsTo(
            Classe::class,
            'classe_id',
            'id'
        );
    }

    /**
     * Une inscription appartient à une année scolaire.
     */
    public function anneeScolaire()
    {
        return $this->belongsTo(
            AnneeScolaire::class,
            'annee_scolaire_id',
            'id'
        );
    }

    /**
     * Une inscription peut avoir plusieurs résultats scolaires.
     */
    public function resultatsScolaires()
    {
        return $this->hasMany(
            ResultatScolaire::class,
            'inscription_id',
            'id'
        );
    }

    /**
     * Une inscription peut avoir plusieurs bulletins.
     */
    public function bulletins()
    {
        return $this->hasMany(
            Bulletin::class,
            'inscription_id',
            'id'
        );
    }
}
