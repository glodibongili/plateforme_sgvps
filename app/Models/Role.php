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
     * Un rôle possède plusieurs utilisateurs.
     */
    public function users()
    {
        return $this->hasMany(
            User::class,
            'role_id',
            'id'
        );
    }


}
