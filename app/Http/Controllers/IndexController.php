<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Конетроллер по умолчанию
 *
 * Class IndexController
 * @package App\Http\Controllers
 */
class IndexController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Request $request)
    {
        return view('welcome');
    }
}
