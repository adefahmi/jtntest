<?php

namespace Modules\Latlong\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\Expr\AssignOp\Mod;

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
            ])->collect();

            $features = $response['features'];
            $data = [
                'lat' => $lat,
                'long' => $long,
                'kode_pos' => $features[0]['context'][1]['text'],
                'desa' => $features[0]['context'][0]['text'],
                'kecamatan' => $features[0]['context'][2]['text'],
                'kota' => $features[0]['context'][3]['text'],
                'provinsi' => $features[0]['context'][4]['text'],
                'negara' => $features[0]['context'][5]['text'],
            ];

        }
        // return $data;

        return view('latlong::index', compact('data'));
    }


}
