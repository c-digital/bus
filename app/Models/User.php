<?php

namespace App\Models;

class User extends Model
{
    /**
     * The table associated with model.
     *
     * $var string
     */
    protected $table = 'users';

    /**
     * The primary key of the model.
     *
     * $var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * $var array
     */
    protected $fillable = [
        'photo',
        'name',
        'email',
        'password',
        'role',
        'id_company',
        'oauth',
        'hash',
        'two_fa',
        'date_create',
        'date_update'
    ];

    /**
     * Set the user photo.
     *
     * @param  string  $value
     * @return void
     */
    public function setPhotoAttribute(?string $value)
    {
        if ($value != '') {
            $this->attributes['photo'] = '/resources/assets/img/'.$value;
        }
    }

    /**
     * Get the user photo.
     *
     * @param  string  $value
     * @return string
     */
    public function getPhotoAttribute(?string $value): string
    {
        if ($value == '') {
            return 'https://ui-avatars.com/api?size=200&background=cb0c9f&color=fff&name='.$this->name;
        }

        return $value;
    }

    public function scopeName($query, $name)
    {
        if ($name) {
            return $query->orWhere('name', 'LIKE', '%' . $name . '%');
        }
    }

    public function scopeEmail($query, $email)
    {
        if ($email) {
            return $query->orWhere('email', 'LIKE', '%' . $email . '%');
        }
    }
}
