<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function pressRelease() {
        return view('static.press-release');
    }

    public function blog1() {
        return view('static.blog1');
    }

    public function blog2() {
        return view('static.blog2');
    }
}
