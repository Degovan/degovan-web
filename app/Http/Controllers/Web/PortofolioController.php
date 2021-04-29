<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portofolio;

class PortofolioController extends Controller
{
    public function index()
    {

        $portofolios = Portofolio::all();
        $data = [
            'title' => 'Degovan',
            'portofolios' => $portofolios
        ];
        return view('web.portofolio.index', $data);
    }
}
