<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class BarangController extends Controller
{
   
    public function index()
    {
        $client = new Client();
        $response = $client->get('http://localhost:8000/api/barang');
        $data = json_decode($response->getBody(), true);

        return view('barang.dataBarang', ['barang' => $data['barang']]);
    }



    public function create()
    {
        return view('barang.ManageBarang');
    }

    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'stok' => 'required|integer',
            'harga' => 'required|integer',
            'keterangan' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            // Menyiapkan data untuk dikirim ke API
            $client = new Client();
            $response = $client->post('http://127.0.0.1:8000/api/barang', [
                'multipart' => [
                    [
                        'name' => 'nama_barang',
                        'contents' => $request->input('nama_barang')
                    ],
                    [
                        'name' => 'kategori',
                        'contents' => $request->input('kategori')
                    ],
                    [
                        'name' => 'stok',
                        'contents' => $request->input('stok')
                    ],
                    [
                        'name' => 'harga',
                        'contents' => $request->input('harga')
                    ],
                    [
                        'name' => 'keterangan',
                        'contents' => $request->input('keterangan')
                    ],
                    [
                        'name' => 'gambar',
                        'contents' => fopen($request->file('gambar')->getPathname(), 'r'),
                        'filename' => $request->file('gambar')->getClientOriginalName()
                    ]
                ]
            ]);


            if ($response->getStatusCode() == 201) {
                return redirect('/ManageBarang')->with('success', 'Barang berhasil disimpan.');
            } else {
                return back()->withErrors(['message' => 'Gagal menyimpan barang.']);
            }
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Gagal menyimpan barang.']);
        }
    }

    //         if ($response->getStatusCode() == 201) {
    //             return redirect()->route('barang.ManageBarang')->with('success', 'Barang berhasil ditambahkan');
    //         } else {
    //             return redirect()->route('dashboard')->with('error', 'Gagal menambahkan barang');
    //         }
    //     } catch (RequestException $e) {
    //         return redirect()->route('dashboard')->with('error', 'Gagal menambahkan barang: ' . $e->getMessage());
    //     }
    // }




    public function edit($id)
    {
        $client = new Client();
        $response = $client->get('http://localhost:8000/api/barang/' . $id);
        $barang = json_decode($response->getBody()->getContents(), true)['barang'];

        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $client = new Client();
        $response = $client->put('http://localhost:8000/api/barang/' . $id, [
            'form_params' => $request->all(),
            'headers' => [
                'Accept' => 'application/json',
            ],
        ]);

        return redirect('/DataBarang')->with('success', 'Barang berhasil diperbarui');
    }



    public function destroy($id)
    {
        try {
            $client = new Client();
            $response = $client->delete("http://localhost:8000/api/barang/{$id}");

            if ($response->getStatusCode() == 200) {
                return redirect('/DataBarang')->with('success', 'Barang berhasil dihapus.');
            } else {
                return back()->withErrors(['message' => 'Gagal menghapus barang.']);
            }
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Gagal menghapus barang.']);
        }
    }

}
