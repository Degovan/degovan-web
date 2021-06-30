<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function index()
    {
        $data = [
            'title'  => 'Degovan',
            'nav'    => 'home',
        ];

        return view('web.pricing.index', $data);
    }
}
