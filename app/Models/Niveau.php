<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    use HasFactory;

    protected $table = 'niveaux';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nom_niveau',
        'actif',
    ];

    protected function casts(): array
    {
        return [
            'actif' => 'boolean',
        ];
    }

    /**
     * Un niveau possède plusieurs classes.
     */
    public function classes()
    {
        return $this->hasMany(
            Classe::class,
            'niveau_id',
            'id'
        );
    }
}
