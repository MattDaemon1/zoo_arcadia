<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Visite
 *
 * @property $id
 * @property $animal_id
 * @property $date_visite
 * @property $remarques
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Visite extends Model
{
    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['animal_id', 'date_visite', 'remarques'];


}
