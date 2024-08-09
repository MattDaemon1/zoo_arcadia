<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Habitat
 *
 * @property $id
 * @property $nom
 * @property $description
 * @property $commentaire_habitat
 * @property $created_at
 * @property $updated_at
 *
 * @property Image[] $images
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Habitat extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nom', 'description', 'commentaire_habitat'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(\App\Models\Image::class, 'id', 'habitat_id');
    }
    
}
