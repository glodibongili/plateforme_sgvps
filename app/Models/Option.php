<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $table = 'options';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nom_option',
        'description',
        'actif',
    ];

    protected function casts(): array
    {
        return [
            'actif' => 'boolean',
        ];
    }

    /**
     * Une option possède plusieurs classes.
     */
    public function classes()
    {
        return $this->hasMany(Classe::class, 'option_id', 'id');
    }
}
