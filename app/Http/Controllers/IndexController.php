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
     */
    public function __invoke(Request $request)
    {
        $redis = new \Redis();
        $redis->connect('redis');
        $redis->set('test', json_encode(['sfs', 'fsfsf']));
        dd(json_decode($redis->get('test'), true));
    }
}
