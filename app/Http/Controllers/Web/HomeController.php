<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;

class HomeController extends Controller
{
    public function index()
    {
        $member = Member::all();
        $data = [
            'title'  => 'Home',
            'nav'    => 'home',
            'member' => $member
        ];

        return view('web.home.index', $data);
    }
}
