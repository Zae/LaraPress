<?php

namespace Zae\LaraPress\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CommentMeta
 *
 * @package Zae\LaraPress\Models
 */
class CommentMeta extends Model
{
    protected $table = 'wp_commentmeta';
    protected $primaryKey = 'meta_id';
    protected $appends = ['id', 'key', 'value'];
    protected $hidden = ['meta_id', 'comment_id', 'meta_key', 'meta_value'];

    public $timestamps = false;

    /*
     * Relations
     */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function comment()
    {
        return $this->belongsTo(Comment::class);
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
    public function setKeyAttribute($value)
    {
        $this->attributes['meta_key'] = $value;
    }

    /**
     * @return mixed
     */
    public function getKeyAttribute()
    {
        return $this->attributes['meta_key'];
    }

    /**
     * @param $value
     */
    public function setValueAttribute($value)
    {
        $this->attributes['meta_value'] = $value;
    }

    /**
     * @return mixed
     */
    public function getValueAttribute()
    {
        return $this->attributes['meta_value'];
    }
}
