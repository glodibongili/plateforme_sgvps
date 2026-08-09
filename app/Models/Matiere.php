<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    use HasFactory;

    protected $table = 'matieres';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nom_matiere',
        'code_matiere',
        'coefficient',
        'actif',
    ];

    protected function casts(): array
    {
        return [
            'coefficient' => 'decimal:2',
            'actif' => 'boolean',
        ];
    }

    /**
     * Une matière possède plusieurs notes.
     */
    public function notes()
    {
        return $this->hasMany(
            Note::class,
            'matiere_id',
            'id'
        );
    }
}
