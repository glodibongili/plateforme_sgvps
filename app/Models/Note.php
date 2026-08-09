<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $table = 'notes';

    protected $primaryKey = 'id';

    /**
     * Attributs pouvant être remplis en masse.
     */
    protected $fillable = [
        'inscription_id',
        'matiere_id',
        'note_obtenue',
        'note_maximale',
        'periode',
        'observation',
    ];

    /**
     * Conversion des attributs.
     */
    protected function casts(): array
    {
        return [
            'note_obtenue' => 'decimal:2',
            'note_maximale' => 'decimal:2',
        ];
    }

    /**
     * Une note appartient à une inscription.
     */
    public function inscription()
    {
        return $this->belongsTo(
            Inscription::class,
            'inscription_id',
            'id'
        );
    }

    /**
     * Une note appartient à une matière.
     */
    public function matiere()
    {
        return $this->belongsTo(
            Matiere::class,
            'matiere_id',
            'id'
        );
    }
}
