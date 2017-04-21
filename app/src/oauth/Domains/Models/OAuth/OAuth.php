<?php

namespace OAuth\Domains\Models\OAuth;

use OAuth\Domains\Models\User\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OAuth
 * @package Vialoja\Entities
 */
class OAuth extends Model
{

    /**
     * @var string
     */
    protected $table = 'oauths';


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'oauth_user', 'oauth_id');
    }

}
