<?php

namespace Zae\LaraPress;

class Option extends \Eloquent {

	protected $primaryKey = 'option_id';
	protected $appends = ['id', 'key', 'value'];
	protected $hidden = ['option_id', 'option_name', 'option_value'];
	
	public $timestamps = false;

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
		$this->attributes['option_name'] = $value;
	}
	public function getKeyAttribute() {
		return $this->attributes['option_name'];
	}

	public function setValueAttribute($value) {
		$this->attributes['option_value'] = $value;
	}
	public function getValueAttribute() {
		return $this->attributes['option_value'];
	}

	/**
	 * Scopes
	 */

	public function scopeAutoload($query) {
		return $query->where('autoload', 'yes');
	}
	public function scopeNotAutoload($query) {
		return $query->where('autoload', 'no');
	}
	
}
