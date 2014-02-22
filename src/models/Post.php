<?php

namespace Zae\LaraPress;

class Post extends \Eloquent {

	const CREATED_AT = 'post_data';
	const UPDATED_AT = 'post_modified';

	protected $primaryKey = 'ID';
	protected $appends = ['id', 'title', 'name', 'content', 'excerpt', 'status', 'password', 'type', 'mime'];
	protected $hidden = ['ID', 'post_title', 'post_name', 'post_content', 'post_excerpt', 'post_status', 'post_password', 'post_type', 'post_mime_type', 'post_author', 'post_parent'];

	/**
	 * Relations
	 */

	public function postmeta() {
		return $this->hasMany('Zae\LaraPress\PostMeta');
	}

	public function meta() {
		return $this->postmeta();
	}

	public function comments() {
		return $this->hasMany('Zae\LaraPress\Comment', 'comment_post_ID', $this->primaryKey);
	}

	public function user() {
		return $this->belongsTo('Zae\LaraPress\User', 'post_author', 'ID');
	}

	public function author() {
		return $this->user();
	}

	public function parent() {
		return $this->belongsTo('Zae\LaraPress\Post', 'post_parent', $this->primaryKey);
	}

	public function children() {
		return $this->hasMany('Zae\LaraPress\Post', 'post_parent', $this->primaryKey);
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

	public function setContentAttribute($value) {
		$this->attributes['post_content'] = $value;
	}
	public function getContentAttribute() {
		return $this->attributes['post_content'];
	}

	public function setTitleAttribute($value) {
		$this->attributes['post_title'] = $value;
	}
	public function getTitleAttribute() {
		return $this->attributes['post_title'];
	}

	public function setExcerptAttribute($value) {
		$this->attributes['post_excerpt'] = $value;
	}
	public function getExcerptAttribute() {
		return $this->attributes['post_excerpt'];
	}

	public function setStatusAttribute($value) {
		$this->attributes['post_status'] = $value;
	}
	public function getStatusAttribute() {
		return $this->attributes['post_status'];
	}

	public function setPasswordAttribute($value) {
		$this->attributes['post_password'] = $value;
	}
	public function getPasswordAttribute() {
		return $this->attributes['post_password'];
	}

	public function setNameAttribute($value) {
		$this->attributes['post_name'] = $value;
	}
	public function getNameAttribute() {
		return $this->attributes['post_name'];
	}

	public function setTypeAttribute($value) {
		$this->attributes['post_type'] = $value;
	}
	public function getTypeAttribute() {
		return $this->attributes['post_type'];
	}

	public function setMimeAttribute($value) {
		$this->attributes['post_mime_type'] = $value;
	}
	public function getMimeAttribute() {
		return $this->attributes['post_mime_type'];
	}

}
