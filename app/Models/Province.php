<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model{

    use HasFactory;

    protected $table = 'provinces';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nom_province',
        'chef_lieu',
        'code_province',
        'actif',
    ];

    protected function casts(): array
    {
        return [
            'actif' => 'boolean',
        ];
    }

    /**
     * Une province possède plusieurs utilisateurs.
     */
    public function users()
    {
        return $this->hasMany(User::class, 'province_id', 'id');
    }

    /**
     * Une province possède plusieurs établissements.
     */
    public function etablissements()
    {
        return $this->hasMany(Etablissement::class, 'province_id', 'id');
    }
}
