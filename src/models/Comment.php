<?php

namespace Zae\LaraPress;

class Comment extends \Eloquent {

	const CREATED_AT = 'comment_date';
	const UPDATED_AT = 'comment_date';

	protected $primaryKey = 'comment_ID';
	protected $appends = ['id', 'author', 'author_email', 'author_url', 'author_IP', 'content', 'karma', 'approved', 'user_agent', 'type'];
	protected $hidden = ['comment_ID', 'comment_post_ID', 'comment_parent', 'user_id', 'comment_author', 'comment_author_email', 'comment_author_url', 'comment_author_IP', 'comment_content', 'comment_karma', 'comment_approved', 'comment_agent', 'comment_type'];

	/**
	 * Relations
	 */

	public function post() {
		return $this->belongsTo('Zae\LaraPress\Post', 'comment_post_ID', 'ID');
	}

	public function user() {
		return $this->belongsTo('Zae\LaraPress\User', 'user_id', 'ID');
	}

	public function commentmeta() {
		return $this->hasMany('Zae\LaraPress\CommentMeta', 'comment_id', $this->primaryKey);
	}

	public function meta() {
		return $this->commentmeta();
	}

	public function parent() {
		return $this->belongsTo('Zae\LaraPress\Comment', 'comment_parent', $this->primaryKey);
	}

	public function children() {
		return $this->hasMany('Zae\LaraPress\Comment', 'comment_parent', $this->primaryKey);
	}

	/**
	 * Accessors & Mutators
	 */

	public function setIdAttribute($value) {
		$this->attributes[$this->primaryKey] = $value;
	}
	public function getIdAttribute() {
		return $this->attributes[$this->primaryKey];
	}
	
	public function setAuthorAttribute($value) {
		$this->attributes['comment_author'] = $value;
	}
	public function getAuthorAttribute() {
		return $this->attributes['comment_author'];
	}
	
	public function setAuthorEmailAttribute($value) {
		$this->attributes['comment_author_email'] = $value;
	}
	public function getAuthorEmailAttribute() {
		return $this->attributes['comment_author_email'];
	}
	
	public function setAuthorUrlAttribute($value) {
		$this->attributes['comment_author_url'] = $value;
	}
	public function getAuthorUrlAttribute() {
		return $this->attributes['comment_author_url'];
	}

	public function setAuthorIPAttribute($value) {
		$this->attributes['comment_author_IP'] = $value;
	}
	public function getAuthorIPAttribute() {
		return $this->attributes['comment_author_IP'];
	}

	public function setContentAttribute($value) {
		$this->attributes['comment_content'] = $value;
	}
	public function getContentAttribute() {
		return $this->attributes['comment_content'];
	}

	public function setKarmaAttribute($value) {
		$this->attributes['comment_karma'] = $value;
	}
	public function getKarmaAttribute() {
		return $this->attributes['comment_karma'];
	}

	public function setApprovedAttribute($value) {
		$this->attributes['comment_approved'] = $value;
	}
	public function getApprovedAttribute() {
		return $this->attributes['comment_approved'];
	}

	public function setUserAgentAttribute($value) {
		$this->attributes['comment_agent'] = $value;
	}
	public function getUserAgentAttribute() {
		return $this->attributes['comment_agent'];
	}

	public function setTypeAttribute($value) {
		$this->attributes['comment_type'] = $value;
	}
	public function getTypeAttribute() {
		return $this->attributes['comment_type'];
	}

	/**
	 * Scopes
	 */

	public function scopeApproved($query) {
		return $query->where('comment_approved', true);
	}
	public function scopeNotApproved($query) {
		return $query->where('comment_approved', false);
	}
	
}
