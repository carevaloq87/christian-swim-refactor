<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PetFood extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pet_foods';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                    'name',
                    'pet_id'
                ];


}
