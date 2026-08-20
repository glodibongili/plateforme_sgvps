<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnneeScolaire extends Model
{
    use HasFactory;

    protected $table = 'annees_scolaires';

    protected $primaryKey = 'id';

    protected $fillable = [
        'libelle',
        'date_debut',
        'date_fin',
        'en_cours',
        'actif',
    ];

    protected function casts(): array
    {
        return [
            'date_debut' => 'date',
            'date_fin' => 'date',
            'en_cours' => 'boolean',
            'actif' => 'boolean',
        ];
    }

    /**
     * Une année scolaire possède plusieurs inscriptions.
     */
    public function inscriptions()
    {
        return $this->hasMany(
            Inscription::class,
            'annee_scolaire_id',
            'id'
        );
    }

    /**
 * Une année scolaire possède plusieurs classes.
 */
    public function classes()
    {
        return $this->hasMany(
          Classe::class,
          'annee_scolaire_id',
          'id'
        );
    }
}
