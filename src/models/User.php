<?php

namespace Zae\LaraPress;

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends \Eloquent implements UserInterface, RemindableInterface {

	protected $primaryKey = 'ID';
	protected $appends = ['id', 'login', 'nicename', 'email', 'URL', 'registered', 'activation_key', 'status'];
	protected $hidden = ['user_pass', 'ID', 'user_login', 'user_nicename', 'user_email', 'user_url', 'user_registered', 'user_activation_key', 'user_status'];
	
	public $timestamps = false;

	/**
	 * Relations
	 */

	public function usermeta() {
		return $this->hasMany('Zae\LaraPress\UserMeta', 'user_id', 'ID');
	}

	public function meta() {
		return $this->usermeta();
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

	public function setLoginAttribute($value) {
		$this->attributes['user_login'] = $value;
	}
	public function getLoginAttribute() {
		return $this->attributes['user_login'];
	}

	public function setPasswordAttribute($value) {
		$this->attributes['user_pass'] = $value;
	}
	public function getPasswordAttribute() {
		return $this->attributes['user_pass'];
	}

	public function setNicenameAttribute($value) {
		$this->attributes['user_nicename'] = $value;
	}
	public function getNicenameAttribute() {
		return $this->attributes['user_nicename'];
	}

	public function setEmailAttribute($value) {
		$this->attributes['user_email'] = $value;
	}
	public function getEmailAttribute() {
		return $this->attributes['user_email'];
	}

	public function setURLAttribute($value) {
		$this->attributes['user_url'] = $value;
	}
	public function getURLAttribute() {
		return $this->attributes['user_url'];
	}

	public function setRegisteredAttribute($value) {
		$this->attributes['user_registered'] = $value;
	}
	public function getRegisteredAttribute() {
		return $this->attributes['user_registered'];
	}

	public function setActivationKeyAttribute($value) {
		$this->attributes['user_activation_key'] = $value;
	}
	public function getActivationKeyAttribute() {
		return $this->attributes['user_activation_key'];
	}

	public function setStatusAttribute($value) {
		$this->attributes['user_status'] = $value;
	}
	public function getStatusAttribute() {
		return $this->attributes['user_status'];
	}

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->user_pass;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->user_email;
	}

}