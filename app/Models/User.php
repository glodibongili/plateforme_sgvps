<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    use HasFactory, Notifiable;

    /**
     * Attributs assignables en masse.
     */
    protected $fillable = [
        'nom',
        'postnom',
        'prenom',
        'sexe',
        'email',
        'password',
        'photo_profil',
        'role_id',
        'compte_id',
        'province_id',
        'actif',
    ];

    /**
     * Attributs masqués.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Conversion des attributs.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'actif' => 'boolean',
            'password' => 'hashed',
        ];
    }

    /**
     * Un utilisateur appartient à un rôle.
     */
    public function role()
    {
        return $this->belongsTo(
            Role::class,
            'role_id',
            'id'
        );
    }

    /**
     * Un utilisateur appartient à un compte.
     */
    public function compte()
    {
        return $this->belongsTo(
            Compte::class,
            'compte_id',
            'id'
        );
    }

    /**
     * Un utilisateur appartient à une province.
     */
    public function province()
    {
        return $this->belongsTo(
            Province::class,
            'province_id',
            'id'
        );
    }

    /**
 * Un utilisateur possède plusieurs activités dans le journal.
 */
public function journalActivites()
{
    return $this->hasMany(
        JournalActivite::class,
        'user_id',
        'id'
    );
}

    /**
     * Vérifie si l'utilisateur possède un rôle.
     */
    public function hasRole(string $roleName): bool
    {
        return $this->role?->nom_role === $roleName;
    }

    /**
     * Vérifie si l'utilisateur est actif.
     */
    public function isActive(): bool
    {
        return $this->actif === true;
    }




}
