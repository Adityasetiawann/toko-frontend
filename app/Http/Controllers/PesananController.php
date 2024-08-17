<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PesananController extends Controller
{
    
    public function index()
    {
        $client = new Client();
        $response = $client->get('http://localhost:8000/api/pesanan-details');
        $data = json_decode($response->getBody(), true);

        return view('Pesanan.DetailPesanan', ['pesanan_details' => $data['pesanan_details']]);
    }
    
    
    
    // public function index()
    // {
    //     $client = new Client();
    //     try {
    //         $response = $client->get('http://localhost:8000/api/pesanan');
    //         $data = json_decode($response->getBody(), true);

    //         return view('pesanan.detailPesanan', ['pesanan' => $data['pesanan']]);
    //     } catch (\Exception $e) {
    //         return view('pesanan.detailPesanan', ['error' => $e->getMessage()]);
    //     }
    // }
}
