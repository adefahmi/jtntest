<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class EncryptionController extends Controller
{

    public function index()
    {
        return view('encrypt.index');
    }

    public function encrypt(Request $request)
    {
        $result = Crypt::encryptString($request->string) ?? '';

        return view('encrypt.index', compact('result'));
    }

    public function decrypt(Request $request)
    {
         $result = Crypt::decryptString($request->string) ?? '';

         return view('encrypt.index', compact('result'));
    }
}
