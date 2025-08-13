<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    // Get data
    public function index()
    {
        return response()->json(Buku::all(), 200);
    }

    // Tambah data
    public function store(Request $request)
{
    $request->validate([
        'nama_buku' => 'required|string|max:255',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // validasi file gambar
    ]);

    $data = [
        'nama_buku' => $request->nama_buku,
    ];

    if ($request->hasFile('gambar')) {
        $fileName = time().'_'.$request->gambar->getClientOriginalName();
        $request->gambar->move(public_path('uploads'), $fileName);
        $data['gambar'] = $fileName;
    }

    $buku = Buku::create($data);

    return response()->json($buku, 201);
}
    // Get data byId
    public function show($id)
    {
        $buku = Buku::find($id);

        if (!$buku) {
            return response()->json(['message' => 'Buku tidak ditemukan'], 404);
        }

        return response()->json($buku, 200);
    }

    public function update(Request $request, $id)
    {
        $buku = Buku::find($id);

        if (!$buku) {
            return response()->json(['message' => 'Buku tidak ditemukan'], 404);
        }

        $request->validate([
            'nama_buku' => 'sometimes|required|string|max:255',
            'gambar' => 'nullable|string|max:255',
        ]);

        $buku->update($request->all());

        return response()->json($buku, 200);
    }

    public function destroy($id)
    {
        $buku = Buku::find($id);

        if (!$buku) {
            return response()->json(['message' => 'Buku tidak ditemukan'], 404);
        }

        $buku->delete();

        return response()->json(['message' => 'Buku berhasil dihapus'], 200);
    }
}
