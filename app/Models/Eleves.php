<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    use HasFactory;

    protected $table = 'eleves';

    protected $primaryKey = 'id';

    /**
     * Attributs pouvant être remplis en masse.
     */
    protected $fillable = [
        'matricule',
        'photo',
        'nom',
        'postnom',
        'prenom',
        'sexe',
        'date_naissance',
        'lieu_naissance',
        'nom_pere',
        'nom_mere',
        'telephone_parent',
        'adresse',
        'actif',
    ];

    /**
     * Conversion des attributs.
     */
    protected function casts(): array
    {
        return [
            'date_naissance' => 'date',
            'actif' => 'boolean',
        ];
    }

    /**
     * Un élève possède plusieurs inscriptions.
     */
    public function inscriptions()
    {
        return $this->hasMany(
            Inscription::class,
            'eleve_id',
            'id'
        );
    }

    /**
     * Un élève possède plusieurs résultats scolaires.
     */
    public function resultatsScolaires()
    {
        return $this->hasMany(
            ResultatScolaire::class,
            'eleve_id',
            'id'
        );
    }

    /**
     * Un élève possède plusieurs bulletins.
     */
    public function bulletins()
    {
        return $this->hasMany(
            Bulletin::class,
            'eleve_id',
            'id'
        );
    }
}

