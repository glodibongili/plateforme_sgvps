<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notifications';

    protected $primaryKey = 'id';

    /**
     * Attributs pouvant être remplis en masse.
     */
    protected $fillable = [
        'user_id',
        'titre',
        'message',
        'type',
        'lu',
        'date_lecture',
    ];

    /**
     * Conversion des attributs.
     */
    protected function casts(): array
    {
        return [
            'lu' => 'boolean',
            'date_lecture' => 'datetime',
        ];
    }

    /**
     * Une notification appartient à un utilisateur.
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
