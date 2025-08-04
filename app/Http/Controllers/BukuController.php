<?php

namespace App\Http\Controllers;

// ===> File: app/Http/Controllers/BukuController.php
use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller {
    public function index() {
        return Buku::all();
    }

    public function store(Request $request) {
        return Buku::create($request->all());
    }

    public function show($id) {
        return Buku::findOrFail($id);
    }

    public function update(Request $request, $id) {
        $buku = Buku::findOrFail($id);
        $buku->update($request->all());
        return $buku;
    }

    public function destroy($id) {
        return Buku::destroy($id);
    }
}
