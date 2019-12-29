<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

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
     * @return View
     */
    public function __invoke(Request $request): View
    {
        return view('welcome', [
            'user' => $request->user()
        ]);
    }
}
