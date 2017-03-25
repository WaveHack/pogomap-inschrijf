<?php

namespace App\Http\Controllers;

use Cache;

class TestController extends Controller
{
    public function getIndex()
    {
        return [
            'gyms.total' => Cache::get('gyms.total'),
            'gyms.mystic' => Cache::get('gyms.mystic'),
            'gyms.valor' => Cache::get('gyms.valor'),
            'gyms.instinct' => Cache::get('gyms.instinct'),
        ];
    }
}
