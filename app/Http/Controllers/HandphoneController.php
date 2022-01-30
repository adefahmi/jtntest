<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HandphoneController extends Controller
{
    public function input()
    {
        return view('handphone.create');
    }

    public function output()
    {
        return view('handphone.index');
    }

    public function edit()
    {
        return view('handphone.edit');
    }
}
