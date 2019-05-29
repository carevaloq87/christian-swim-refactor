<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * A visual way of displaying the full name of a User
     *
     * @var string
     */
    protected $display_name = '';

    /**
     * A visual way of displaying time in a given format
     *
     * @var string
     */
    protected $login_date_formated = '';

    /**
     * A visual way of displaying time in a given format
     *
     * @var string
     */
    protected $created_at_formated = '';

    /**
     * A visual way of displaying time in a given format
     *
     * @var string
     */
    protected $updated_at_formated = '';

    /**
     * Avoid displaying the User's password
     *
     * @var array
     */
    protected $hidden = ['password'];

    /**
     * This will add all the additional attributes we want when is called as toArray or asJson
     *
     * @var array
     */
    protected $appends = ['display_name', 'login_date_formated', 'created_at_formated', 'updated_at_formated'];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                    'email',
                    'first_name',
                    'middle_name',
                    'last_name',
                    'contact_number',
                    'disabled',
                    'login_date',
                ];

    /**
     * Define Laravel's accessors to return the full/display name of an user
     * This will add all the additional attributes we want when is called as toArray or asJson
     *
     * @return string
     */
    public function getDisplayNameAttribute()
    {
        return $this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name;
    }

    /**
     * Define Laravel's accessors to return the full/display name of an user
     * This will add all the additional attributes we want when is called as toArray or asJson
     *
     * @return string
     */
    public function getLoginDateFormatedAttribute()
    {
        return ($this->login_date) ? $this->login_date->format('Y-m-d H:i:s') : '';
    }

    /**
     * Define Laravel's accessors to return the full/display name of an user
     * This will add all the additional attributes we want when is called as toArray or asJson
     *
     * @return string
     */
    public function getCreatedAtFormatedAttribute()
    {
        return ($this->created_at) ? $this->created_at->format('Y-m-d H:i:s') : '';
    }

    /**
     * Define Laravel's accessors to return the full/display name of an user
     * This will add all the additional attributes we want when is called as toArray or asJson
     *
     * @return string
     */
    public function getUpdatedAtFormatedAttribute()
    {
        return ($this->updated_at) ? $this->updated_at->format('Y-m-d H:i:s') : '';
    }

    /**
     * Get the pets for the user.
     */
    public function pets()
    {
        return $this->hasMany('App\Models\Pet');
    }

}
