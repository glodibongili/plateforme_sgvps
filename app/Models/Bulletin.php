<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bulletin extends Model
{
    use HasFactory;

    protected $table = 'bulletins';

    protected $primaryKey = 'id';

    /**
     * Attributs pouvant être remplis en masse.
     */
    protected $fillable = [
        'resultat_scolaire_id',
        'numero_bulletin',
        'qr_code',
        'fichier_pdf',
        'date_emission',
        'statut',
    ];

    /**
     * Conversion des attributs.
     */
    protected function casts(): array
    {
        return [
            'date_emission' => 'date',
        ];
    }

    /**
     * Un bulletin appartient à un résultat scolaire.
     */
    public function resultatScolaire()
    {
        return $this->belongsTo(
            ResultatScolaire::class,
            'resultat_scolaire_id',
            'id'
        );
    }

    /**
 * Un bulletin peut avoir plusieurs vérifications.
 */
    public function verifications()
    {
        return $this->hasMany(
           Verification::class,
           'bulletin_id',
           'id'
        );
   }
}
