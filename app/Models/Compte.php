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
        'nom_utilisateur',
        'mot_de_passe',
        'statut',
        'id_role',
        'id_user',
    ];

    /**
     * Un compte appartient à un rôle.
     */
    public function role()
    {
        return $this->hasOne(Role::class, 'id_role', 'id');
    }

    /**
     * Un compte appartient à un utilisateur.
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id_user', 'id');
    }
}
