<?php

namespace Vialoja\Modeling\Applications\Http\Controllers;

use Vialoja\Core\Http\Controllers\Controller;

class BaseController extends Controller
{

    protected $viewNamespace = 'modeling::';

    protected function view($view = null, $data = [], $mergeData = [])
    {

        if (!empty($this->viewNamespace) && !str_contains($view, '::')) {
            $view = $this->viewNamespace . $view;
        }

        return view($view, $data, $mergeData);
    }

}
