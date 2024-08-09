<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Image
 *
 * @property $id
 * @property $image_data
 * @property $nom_fichier
 * @property $type_mime
 * @property $taille
 * @property $alt
 * @property $habitat_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Habitat $habitat
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Image extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['image_data', 'nom_fichier', 'type_mime', 'taille', 'alt', 'habitat_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function habitat()
    {
        return $this->belongsTo(\App\Models\Habitat::class, 'habitat_id', 'id');
    }
    
}
