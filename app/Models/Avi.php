<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Avi
 *
 * @property $id
 * @property $pseudo
 * @property $commentaire
 * @property $isVisible
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Avi extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['pseudo', 'commentaire', 'isVisible'];


}
