<?php

namespace Zae\LaraPress\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment
 *
 * @package Zae\LaraPress\Models
 */
class Comment extends Model
{
    const CREATED_AT = 'comment_date';
    const UPDATED_AT = 'comment_date';

    protected $table = 'wp_comments';
    protected $primaryKey = 'comment_ID';
    protected $appends = [
        'id',
        'author',
        'author_email',
        'author_url',
        'author_IP',
        'content',
        'karma',
        'approved',
        'user_agent',
        'type'
    ];

    protected $hidden = [
        'comment_ID',
        'comment_post_ID',
        'comment_parent',
        'user_id',
        'comment_author',
        'comment_author_email',
        'comment_author_url',
        'comment_author_IP',
        'comment_content',
        'comment_karma',
        'comment_approved',
        'comment_agent',
        'comment_type'
    ];

    /*
     * Relations
     */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->belongsTo(Post::class, 'comment_post_ID', 'ID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'ID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function commentmeta()
    {
        return $this->hasMany(CommentMeta::class, 'comment_id', $this->primaryKey);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function meta()
    {
        return $this->commentmeta();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(__CLASS__, 'comment_parent', $this->primaryKey);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(__CLASS__, 'comment_parent', $this->primaryKey);
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
    public function setAuthorAttribute($value)
    {
        $this->attributes['comment_author'] = $value;
    }

    /**
     * @return mixed
     */
    public function getAuthorAttribute()
    {
        return $this->attributes['comment_author'];
    }

    /**
     * @param $value
     */
    public function setAuthorEmailAttribute($value)
    {
        $this->attributes['comment_author_email'] = $value;
    }

    /**
     * @return mixed
     */
    public function getAuthorEmailAttribute()
    {
        return $this->attributes['comment_author_email'];
    }

    /**
     * @param $value
     */
    public function setAuthorUrlAttribute($value)
    {
        $this->attributes['comment_author_url'] = $value;
    }

    /**
     * @return mixed
     */
    public function getAuthorUrlAttribute()
    {
        return $this->attributes['comment_author_url'];
    }

    /**
     * @param $value
     */
    public function setAuthorIPAttribute($value)
    {
        $this->attributes['comment_author_IP'] = $value;
    }

    /**
     * @return mixed
     */
    public function getAuthorIPAttribute()
    {
        return $this->attributes['comment_author_IP'];
    }

    /**
     * @param $value
     */
    public function setContentAttribute($value)
    {
        $this->attributes['comment_content'] = $value;
    }

    /**
     * @return mixed
     */
    public function getContentAttribute()
    {
        return $this->attributes['comment_content'];
    }

    /**
     * @param $value
     */
    public function setKarmaAttribute($value)
    {
        $this->attributes['comment_karma'] = $value;
    }

    /**
     * @return mixed
     */
    public function getKarmaAttribute()
    {
        return $this->attributes['comment_karma'];
    }

    /**
     * @param $value
     */
    public function setApprovedAttribute($value)
    {
        $this->attributes['comment_approved'] = $value;
    }

    /**
     * @return mixed
     */
    public function getApprovedAttribute()
    {
        return $this->attributes['comment_approved'];
    }

    /**
     * @param $value
     */
    public function setUserAgentAttribute($value)
    {
        $this->attributes['comment_agent'] = $value;
    }

    /**
     * @return mixed
     */
    public function getUserAgentAttribute()
    {
        return $this->attributes['comment_agent'];
    }

    /**
     * @param $value
     */
    public function setTypeAttribute($value)
    {
        $this->attributes['comment_type'] = $value;
    }

    /**
     * @return mixed
     */
    public function getTypeAttribute()
    {
        return $this->attributes['comment_type'];
    }

    /*
     * Scopes
     */

    /**
     * @param $query
     */
    public function scopeApproved($query)
    {
        $query->where('comment_approved', true);
    }

    /**
     * @param $query
     */
    public function scopeNotApproved($query)
    {
        $query->where('comment_approved', false);
    }
}
