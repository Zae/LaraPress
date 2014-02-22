<?php

namespace Zae\LaraPress;

class CommentMeta extends \Eloquent {

	protected $table = 'commentmeta';
	protected $primaryKey = 'meta_id';
	protected $appends = ['id', 'key', 'value'];
	protected $hidden = ['meta_id', 'comment_id', 'meta_key', 'meta_value'];

	public $timestamps = false;

	/**
	 * Relations
	 */

	public function comment() {
		return $this->belongsTo('Zae\LaraPress\Comment');
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

	public function setKeyAttribute($value) {
		$this->attributes['meta_key'] = $value;
	}
	public function getKeyAttribute() {
		return $this->attributes['meta_key'];
	}

	public function setValueAttribute($value) {
		$this->attributes['meta_value'] = $value;
	}
	public function getValueAttribute() {
		return $this->attributes['meta_value'];
	}

}
