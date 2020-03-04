<?php

namespace Zae\LaraPress\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 *
 * @package Zae\LaraPress\Models
 */
class Post extends Model
{
    const CREATED_AT = 'post_date';
    const UPDATED_AT = 'post_modified';

    protected $table = 'wp_posts';
    protected $primaryKey = 'ID';
    protected $appends = ['id', 'title', 'name', 'content', 'excerpt', 'status', 'password', 'type', 'mime'];
    protected $hidden = [
        'ID',
        'post_title',
        'post_name',
        'post_content',
        'post_excerpt',
        'post_status',
        'post_password',
        'post_type',
        'post_mime_type',
        'post_author',
        'post_parent'
    ];


    /*
     * Other constants
     */

    const STATUS_PUBLISHED = 'publish';
    const STATUS_DRAFT = 'draft';
    const STATUS_INHERIT = 'inherit';
    const STATUS_OPEN = 'open';
    const STATUS_CLOSED = 'closed';

    /*
     * Relations
     */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function postmeta()
    {
        return $this->hasMany(PostMeta::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function meta()
    {
        return $this->postmeta();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'comment_post_ID', $this->primaryKey);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'post_author', 'ID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->user();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(__CLASS__, 'post_parent', $this->primaryKey);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(__CLASS__, 'post_parent', $this->primaryKey);
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
    public function setContentAttribute($value)
    {
        $this->attributes['post_content'] = $value;
    }

    /**
     * @return mixed
     */
    public function getContentAttribute()
    {
        return $this->attributes['post_content'];
    }

    /**
     * @param $value
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['post_title'] = $value;
    }

    /**
     * @return mixed
     */
    public function getTitleAttribute()
    {
        return $this->attributes['post_title'];
    }

    /**
     * @param $value
     */
    public function setExcerptAttribute($value)
    {
        $this->attributes['post_excerpt'] = $value;
    }

    /**
     * @return mixed
     */
    public function getExcerptAttribute()
    {
        return $this->attributes['post_excerpt'];
    }

    /**
     * @param $value
     */
    public function setStatusAttribute($value)
    {
        $this->attributes['post_status'] = $value;
    }

    /**
     * @return mixed
     */
    public function getStatusAttribute()
    {
        return $this->attributes['post_status'];
    }

    /**
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['post_password'] = $value;
    }

    /**
     * @return mixed
     */
    public function getPasswordAttribute()
    {
        return $this->attributes['post_password'];
    }

    /**
     * @param $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['post_name'] = $value;
    }

    /**
     * @return mixed
     */
    public function getNameAttribute()
    {
        return $this->attributes['post_name'];
    }

    /**
     * @param $value
     */
    public function setTypeAttribute($value)
    {
        $this->attributes['post_type'] = $value;
    }

    /**
     * @return mixed
     */
    public function getTypeAttribute()
    {
        return $this->attributes['post_type'];
    }

    /**
     * @param $value
     */
    public function setMimeAttribute($value)
    {
        $this->attributes['post_mime_type'] = $value;
    }

    /**
     * @return mixed
     */
    public function getMimeAttribute()
    {
        return $this->attributes['post_mime_type'];
    }

    /*
     * Scopes
     */

    /**
     * @param $query
     */
    public function scopePublished($query)
    {
        $query->where('post_status', static::STATUS_PUBLISHED);
    }

    /**
     * @param $query
     */
    public function scopeDraft($query)
    {
        $query->where('post_status', static::STATUS_DRAFT);
    }

    /**
     * @param $query
     */
    public function scopeCommentsOpen($query)
    {
        $query->where('comment_status', static::STATUS_OPEN);
    }

    /**
     * @param $query
     */
    public function scopeCommentsClosed($query)
    {
        $query->where('comment_status', static::STATUS_CLOSED);
    }

    /**
     * @param $query
     */
    public function scopePingOpen($query)
    {
        $query->where('ping_status', static::STATUS_OPEN);
    }

    /**
     * @param $query
     */
    public function scopePingClosed($query)
    {
        $query->where('ping_status', static::STATUS_CLOSED);
    }
}
