<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $table = 'sections';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nom_section',
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
     * Une section possède plusieurs classes.
     */
    public function classes()
    {
        return $this->hasMany(Classe::class, 'section_id', 'id');
    }
}
