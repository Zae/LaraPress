<?php

namespace Zae\LaraPress\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Link
 *
 * @package Zae\LaraPress\Models
 */
class Link extends Model
{
    protected $table = 'wp_links';
    protected $primaryKey = 'link_id';

    const CREATED_AT = 'link_updated';
    const UPDATED_AT = 'link_updated';

    /*
     * Scopes
     */

    /**
     * @param $query
     */
    public function scopeVisible($query)
    {
        $query->where('link_visible', 'Y');
    }

    /**
     * @param $query
     */
    public function scopeHidden($query)
    {
        $query->where('link_visible', 'N');
    }
}
