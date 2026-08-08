<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nom_role',
        'description',
        'statut',
    ];

    /**
     * Un rôle possède plusieurs comptes.
     */
    public function comptes()
    {
        return $this->hasMany(Compte::class, 'id_role', 'id');
    }
}
