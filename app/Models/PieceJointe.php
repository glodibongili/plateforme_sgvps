<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PieceJointe extends Model
{
    use HasFactory;

    protected $table = 'piece_jointes';

    protected $primaryKey = 'id';

    /**
     * Attributs pouvant être remplis en masse.
     */
    protected $fillable = [
        'eleve_id',
        'type_piece',
        'nom_fichier',
        'chemin_fichier',
        'taille_fichier',
        'extension',
    ];

    /**
     * Conversion des attributs.
     */
    protected function casts(): array
    {
        return [
            'taille_fichier' => 'integer',
        ];
    }

    /**
     * Une pièce jointe appartient à un élève.
     */
    public function eleve()
    {
        return $this->belongsTo(
            Eleve::class,
            'eleve_id',
            'id'
        );
    }
}
