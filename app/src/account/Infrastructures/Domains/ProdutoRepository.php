<?php

namespace App\Repositories\Eloquent;

use App\Produto;
use App\Repositories\AbstractRepository;

class ProdutoRepository extends AbstractRepository
{
    /**
     * @param Produto $model
     */
    public function __construct(Produto $model)
    {
        /** @var Produto $model */
        $this->model = $model;
    }
}