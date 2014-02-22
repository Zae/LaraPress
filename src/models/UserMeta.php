<?php

namespace Zae\LaraPress;

class UserMeta extends \Eloquent {

	protected $table = 'usermeta';
	protected $primaryKey = 'umeta_id';
	protected $appends = ['id', 'key', 'value'];
	protected $hidden = ['umeta_id', 'user_id', 'meta_key', 'meta_value'];
	
	public $timestamps = false;

	/**
	 * Relations
	 */

	public function user() {
		return $this->belongsTo('Zae\LaraPress\User');
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
