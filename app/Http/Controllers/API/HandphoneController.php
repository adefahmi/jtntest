<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Handphone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HandphoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Handphone::all();

        foreach ($records as $key => $value) {
            $no = (int) $value->nomor;
            if ($no%2 == 0) {
                $data['genap'][] = $value;
            } else {
                $data['ganjil'][] = $value;
            }
        }

        return ResponseFormatter::success(
            $data,
            'Data berhasil diambil'
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nomor' => 'required|numeric',
            'provider_id' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return ResponseFormatter::error(
                ['errors' => $validator->errors()],
                'Validation errors',
                422
            );
        }

        $data = $request->all();
        $handphone = Handphone::create($data);

        return ResponseFormatter::success(
            $handphone,
            'Data berhasil disimpan'
        );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Handphone $handphone)
    {
        return ResponseFormatter::success(
            $handphone,
            'Data berhasil diambil'
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Handphone $handphone)
    {
        $rules = [
            'nomor' => 'required|numeric',
            'provider_id' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return ResponseFormatter::error(
                ['errors' => $validator->errors()],
                'Validation errors',
                422
            );
        }

        $data = $request->all();
        $handphone->update($data);

        return ResponseFormatter::success(
            $handphone,
            'Data berhasil disimpan'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Handphone $handphone)
    {
        $handphone->delete();

        return ResponseFormatter::success(
            null,
            'Data berhasil dihapus'
        );
    }
}
