<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlatformPageController extends Controller
{
    
    public function create()
    {
        return view('platformpages.create');
    }
}
