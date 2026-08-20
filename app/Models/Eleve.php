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
     * Un élève peut avoir plusieurs alertes.
     */
    public function alertes()
    {
        return $this->hasMany(
            Alerte::class,
            'eleve_id',
            'id'
        );
    }

    /**
 * Un élève peut avoir plusieurs transferts.
 */
    public function transferts()
   {
        return $this->hasMany(
            Transfert::class,
            'eleve_id',
            'id'
       );
   }
   /**
 * Un élève peut avoir plusieurs pièces jointes.
 */
    public function pieceJointes()
    {
        return $this->hasMany(
            PieceJointe::class,
            'eleve_id',
            'id'
        );
    }
}
