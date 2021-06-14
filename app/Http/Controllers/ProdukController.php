<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function store(Request $request)
    {
        $result = Produk::create($request->all());

        if ($result) {
            return response()->json([
                'message' => 'Data berhasil disimpan.',
                'data' => $result
            ]);
        } else {
            return response()->json([
                'message' => 'Simpan data Produk gagal.'
            ], 500);
        }
    }

    public function read(Request $request)
    {
        $result = Produk::all();
        return response()->json([
            'data' => $result
        ]);
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);

        if (empty($produk)) {
            return response()->json([
                'message' => 'Data Produk tidak ditemukan.'
            ], 422);
        }

        $status = $produk->update($request->all());

        if ($status) {
            return response()->json([
                'message' => 'Data berhasil diubah.',
            ]);
        } else {
            return response()->json([
                'message' => 'Ubah data Produk gagal.'
            ], 500);
        }
    }

    public function delete($id) {
        $produk = Produk::find($id);

        if (empty($produk)) {
            return response()->json([
                'message' => 'Data Produk tidak ditemukan.'
            ], 422);
        }

        $status = $produk->delete();

        if ($status) {
            return response()->json([
                'message' => 'Data berhasil dihapus.',
            ]);
        } else {
            return response()->json([
                'message' => 'Hapus data Produk gagal.'
            ], 500);
        }
    }
}
