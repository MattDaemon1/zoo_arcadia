<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Consommation
 *
 * @property $id
 * @property $animal_id
 * @property $date
 * @property $heure
 * @property $nourriture
 * @property $quantite
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Consommation extends Model
{
    public function employe()
    {
        return $this->belongsTo(Employe::class, 'employe_id');
    }
    
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
    protected $fillable = ['animal_id', 'date', 'heure', 'nourriture', 'quantite'];


}
