<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimeinputController extends Controller
{
    public function index()
    {
        return view('vue.timeinput');
    }
}
