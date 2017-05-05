<?php

namespace OAuth\Domains\Models\Role;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OAuth\Domains\Models\Permission\Permission;

class Role extends Model
{

    use SoftDeletes;

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'description',
    ];

    public function permissions()
    {
        //retorno todos os papeis que o usuario desempenha no sistema.
        return $this->belongsToMany(Permission::class);
    }

}
