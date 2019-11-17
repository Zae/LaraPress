<?php

namespace Zae\LaraPress\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 *
 * @package Zae\LaraPress\Models
 */
class User extends Model
{
    protected $table = 'wp_users';
    protected $primaryKey = 'ID';
    protected $appends = ['id', 'login', 'nicename', 'email', 'URL', 'registered', 'activation_key', 'status'];
    protected $hidden = [
        'user_pass',
        'ID',
        'user_login',
        'user_nicename',
        'user_email',
        'user_url',
        'user_registered',
        'user_activation_key',
        'user_status'
    ];
    
    public $timestamps = false;

    /*
     * Relations
     */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usermeta()
    {
        return $this->hasMany(UserMeta::class, 'user_id', 'ID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function meta()
    {
        return $this->usermeta();
    }

    /*
     * Accessors & Mutators
     */

    /**
     * @param $value
     */
    public function setIdAttribute($value)
    {
        $this->attributes[$this->primaryKey] = $value;
    }

    /**
     * @return mixed
     */
    public function getIdAttribute()
    {
        return $this->attributes[$this->primaryKey];
    }

    /**
     * @param $value
     */
    public function setLoginAttribute($value)
    {
        $this->attributes['user_login'] = $value;
    }

    /**
     * @return mixed
     */
    public function getLoginAttribute()
    {
        return $this->attributes['user_login'];
    }

    /**
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['user_pass'] = $value;
    }

    /**
     * @return mixed
     */
    public function getPasswordAttribute()
    {
        return $this->attributes['user_pass'];
    }

    /**
     * @param $value
     */
    public function setNicenameAttribute($value)
    {
        $this->attributes['user_nicename'] = $value;
    }

    /**
     * @return mixed
     */
    public function getNicenameAttribute()
    {
        return $this->attributes['user_nicename'];
    }

    /**
     * @param $value
     */
    public function setEmailAttribute($value)
    {
        $this->attributes['user_email'] = $value;
    }

    /**
     * @return mixed
     */
    public function getEmailAttribute()
    {
        return $this->attributes['user_email'];
    }

    /**
     * @param $value
     */
    public function setURLAttribute($value)
    {
        $this->attributes['user_url'] = $value;
    }

    /**
     * @return mixed
     */
    public function getURLAttribute()
    {
        return $this->attributes['user_url'];
    }

    /**
     * @param $value
     */
    public function setRegisteredAttribute($value)
    {
        $this->attributes['user_registered'] = $value;
    }

    /**
     * @return mixed
     */
    public function getRegisteredAttribute()
    {
        return $this->attributes['user_registered'];
    }

    /**
     * @param $value
     */
    public function setActivationKeyAttribute($value)
    {
        $this->attributes['user_activation_key'] = $value;
    }

    /**
     * @return mixed
     */
    public function getActivationKeyAttribute()
    {
        return $this->attributes['user_activation_key'];
    }

    /**
     * @param $value
     */
    public function setStatusAttribute($value)
    {
        $this->attributes['user_status'] = $value;
    }

    /**
     * @return mixed
     */
    public function getStatusAttribute()
    {
        return $this->attributes['user_status'];
    }
}
