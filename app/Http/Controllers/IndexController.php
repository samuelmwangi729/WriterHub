<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    protected function services(){
        return view('Index.Services');
    }
    protected function features(){
        return view('Index.Features');
    }
}
