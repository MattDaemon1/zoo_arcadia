<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Animal
 *
 * @property $id
 * @property $prenom
 * @property $etat
 * @property $race_id
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Animal extends Model
{
    public function race()
    {
        return $this->belongsTo(Race::class);
    }
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['prenom', 'etat', 'race_id'];


}
