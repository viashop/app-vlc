<?php

namespace Account\Domains\Models\Role;

use Account\Domains\Models\Permission\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
