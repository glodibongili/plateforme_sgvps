<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    protected $table = 'classes';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nom_classe',
        'etablissement_id',
        'niveau_id',
        'section_id',
        'option_id',
        'actif',
    ];

    protected function casts(): array
    {
        return [
            'actif' => 'boolean',
        ];
    }

    /**
     * Une classe appartient à un établissement.
     */
    public function etablissement()
    {
        return $this->belongsTo(
            Etablissement::class,
            'etablissement_id',
            'id'
        );
    }

    /**
     * Une classe appartient à un niveau.
     */
    public function niveau()
    {
        return $this->belongsTo(
            Niveau::class,
            'niveau_id',
            'id'
        );
    }

    /**
     * Une classe appartient à une section.
     */
    public function section()
    {
        return $this->belongsTo(
            Section::class,
            'section_id',
            'id'
        );
    }

    /**
     * Une classe appartient à une option.
     */
    public function option()
    {
        return $this->belongsTo(
            Option::class,
            'option_id',
            'id'
        );
    }

    /**
     * Une classe possède plusieurs inscriptions.
     */
    public function inscriptions()
    {
        return $this->hasMany(
            Inscription::class,
            'classe_id',
            'id'
        );
    }
}
