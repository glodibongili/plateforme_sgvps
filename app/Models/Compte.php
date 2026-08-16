<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    use HasFactory;

    protected $table = 'comptes';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nom_compte',
        'description',
        'derniere_connexion',
        'statut',
    ];

    protected function casts(): array
    {
        return [
            'derniere_connexion' => 'datetime',
        ];
    }

    /**
     * Un compte possède plusieurs utilisateurs.
     */
    public function users()
    {
        return $this->hasMany(
            User::class,
            'compte_id',
            'id'
        );
    }
}
