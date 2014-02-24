<?php

namespace Zae\LaraPress;

class Link extends \Eloquent {

	protected $primaryKey = 'link_id';

	const CREATED_AT = 'link_updated';
	const UPDATED_AT = 'link_updated';

	/**
	 * Scopes
	 */

	public function scopeVisible($query) {
		return $query->where('link_visible', 'Y');
	}
	public function scopeHidden($query) {
		return $query->where('link_visible', 'N');
	}

}
