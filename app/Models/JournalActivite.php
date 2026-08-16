<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JournalActivite extends Model
{
    use HasFactory;

    protected $table = 'journal_activites';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'action',
        'description',
        'adresse_ip',
        'user_agent',
        'date_action',
    ];

    protected $casts = [
        'date_action' => 'datetime',
    ];

    /**
     * Le journal appartient à un utilisateur.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
