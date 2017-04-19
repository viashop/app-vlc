<?php

namespace Vialoja\Core\Http\Controllers\Tests;

use Illuminate\Http\Request;
use Vialoja\Core\Http\Controllers\Controller;
use Modeling\Domains\Models\User\User;
use PDF;


class PdfviewController extends Controller
{

    public function index()
    {
        $users = User::all();
        return PDF::loadView('tests.pdf.dompdf', compact('users'))
            ->stream();
    }
}
