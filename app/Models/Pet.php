<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pets';

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
                    'user_id'
                ];

    /**
     * A visual way of displaying the favorite food of a pet
     *
     * @var string
     */
    protected $favourite_foods = [];

    /**
     * This will add all the additional attributes we want when is called as toArray or asJson
     *
     * @var array
     */
    protected $appends = ['favourite_foods'];

    /**
     * Define Laravel's accessors to return the favorite foods of a pet
     * This will add all the additional attributes we want when is called as toArray or asJson
     *
     * @return array
     */
    public function getFavouriteFoodsAttribute()
    {
        return $this->pet_foods()->get();
    }

    /**
     * Get the user that owns the pet.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get the pets for the user.
     */
    public function pet_foods()
    {
        return $this->hasMany('App\Models\PetFood');
    }
}
