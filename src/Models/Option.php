<?php

namespace Zae\LaraPress\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Option
 *
 * @package Zae\LaraPress\Models
 */
class Option extends Model
{
    protected $table = 'wp_options';
    protected $primaryKey = 'option_id';
    protected $appends = ['id', 'key', 'value'];
    protected $hidden = ['option_id', 'option_name', 'option_value'];
    
    public $timestamps = false;

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
    public function setKeyAttribute($value)
    {
        $this->attributes['option_name'] = $value;
    }

    /**
     * @return mixed
     */
    public function getKeyAttribute()
    {
        return $this->attributes['option_name'];
    }

    /**
     * @param $value
     */
    public function setValueAttribute($value)
    {
        $this->attributes['option_value'] = $value;
    }

    /**
     * @return mixed
     */
    public function getValueAttribute()
    {
        return $this->attributes['option_value'];
    }

    /*
     * Scopes
     */

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeAutoload($query)
    {
        return $query->where('autoload', 'yes');
    }

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeNotAutoload($query)
    {
        return $query->where('autoload', 'no');
    }
}
