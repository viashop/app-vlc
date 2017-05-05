<?php

namespace OAuth\Domains\Models\Permission;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OAuth\Domains\Models\Role\Role;

class Permission extends Model
{

    use SoftDeletes;

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'description',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

}
