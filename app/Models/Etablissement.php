<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etablissement extends Model
{
    use HasFactory;

    protected $table = 'etablissements';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nom_etablissement',
        'code_etablissement',
        'type_etablissement',
        'adresse',
        'telephone',
        'email',
        'province_id',
        'actif',
    ];

    protected function casts(): array
    {
        return [
            'actif' => 'boolean',
        ];
    }

    /**
     * Un établissement appartient à une province.
     */
    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }

    /**
     * Un établissement possède plusieurs classes.
     */
    public function classes()
    {
        return $this->hasMany(Classe::class, 'etablissement_id', 'id');
    }

    /**
     * Un établissement possède plusieurs inscriptions.
     */
    public function inscriptions()
    {
        return $this->hasMany(Inscription::class, 'etablissement_id', 'id');
    }

    /**
 * Un établissement peut signaler plusieurs alertes.
 */
    public function alertes()
    {
         return $this->hasMany(
           Alerte::class,
           'etablissement_id',
            'id'
       );
   }
   /**
 * Un établissement peut être l'origine de plusieurs transferts.
 */
    public function transfertsOrigine()
    {
        return $this->hasMany(
          Transfert::class,
          'etablissement_origine_id',
          'id'
       );
    }

    /**
 * Un établissement peut être la destination de plusieurs transferts.
 */
    public function transfertsDestination()
    {
        return $this->hasMany(
          Transfert::class,
          'etablissement_destination_id',
          'id'
       );
    }

}
