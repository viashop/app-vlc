<?php

namespace Account\Domains\Models\Permission;

use Account\Domains\Models\Role\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


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
