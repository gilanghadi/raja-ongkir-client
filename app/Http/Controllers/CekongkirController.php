<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CekongkirController extends Controller
{
    public function index()
    {

        $response = Http::withHeaders([
            'key' => '3e84b4a8c8038cad7a3087e6d366851d',
        ])->get('https://api.rajaongkir.com/starter/city');
        $cities = $response['rajaongkir']['results'];
        return view('cekongkir', [
            'cities' => $cities,
            'data' => '',
            'ongkir' => ''
        ]);
    }

    public function store(Request $request)
    {
        $response = Http::withHeaders([
            'key' => '3e84b4a8c8038cad7a3087e6d366851d',
        ])->get('https://api.rajaongkir.com/starter/city');

        $responseCost = Http::withHeaders([
            'key' => '3e84b4a8c8038cad7a3087e6d366851d',
        ])->post('https://api.rajaongkir.com/starter/cost', [
            'origin' => $request->origin,
            'destination' => $request->destination,
            'courier' => $request->courier,
            'weight' => $request->weight,
        ]);
        $cities = $response['rajaongkir']['results'];
        $ongkir = $responseCost['rajaongkir']['results'];
        $data = $responseCost['rajaongkir'];
        return view('cekongkir', [
            'cities' => $cities,
            'ongkir' => $ongkir,
            'data' => $data
        ]);
    }
}
