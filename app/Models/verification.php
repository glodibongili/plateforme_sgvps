<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    use HasFactory;

    protected $table = 'verifications';

    protected $primaryKey = 'id';

    /**
     * Attributs assignables en masse.
     */
    protected $fillable = [
        'bulletin_id',
        'user_id',
        'date_verification',
        'resultat',
        'observation',
    ];

    /**
     * Conversion des attributs.
     */
    protected function casts(): array
    {
        return [
            'date_verification' => 'datetime',
        ];
    }

    /**
     * Une vérification concerne un bulletin.
     */
    public function bulletin()
    {
        return $this->belongsTo(
            Bulletin::class,
            'bulletin_id',
            'id'
        );
    }

    /**
     * Une vérification est effectuée par un utilisateur.
     */
    public function user()
    {
        return $this->belongsTo(
            User::class,
            'user_id',
            'id'
        );
    }
}
