<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HandphoneController extends Controller
{
    public function input()
    {
        return view('handphone.create');
    }
}
