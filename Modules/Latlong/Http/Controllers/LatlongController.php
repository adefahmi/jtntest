<?php

namespace Modules\Latlong\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\Expr\AssignOp\Mod;
use Illuminate\Support\Str;

class LatlongController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $lat = $request->latitude ?? null;
        $long = $request->longitude ?? null;

        $data = [];
        if ($lat && $long) {
            $path = '/mapbox.places/';
            $response = Http::get(config('latlong.mapbox.url').$path.$lat.','.$long.'.json', [
                'access_token' => config('latlong.mapbox.token')
            ])->collect('features');

            $data = [
                'lat' => $lat,
                'long' => $long,
                'kode_pos' => $this->getItemData($response, 'postcode'),
                'desa' => $this->getItemData($response, 'neighborhood'),
                'kecamatan' => $this->getItemData($response, 'locality'),
                'kota' => $this->getItemData($response, 'place'),
                'provinsi' => $this->getItemData($response, 'region'),
                'negara' => $this->getItemData($response, 'country'),
            ];

        }

        return view('latlong::index', compact('data'));
    }

    public function getItemData($response, $str)
    {
        $data = $response->filter(function($item) use($str) {
            return Str::of($item['id'])->contains($str);
        });

        return $data->first()['text'];
    }


}
