<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tugas;
use Illuminate\Http\Request;

class TugasController extends Controller {
    public function index() {
        return Tugas::with('materi')->get();
    }

    public function store(Request $request) {
        return Tugas::create($request->all());
    }

    public function show($id) {
        return Tugas::with('materi')->findOrFail($id);
    }

    public function update(Request $request, $id) {
        $tugas = Tugas::findOrFail($id);
        $tugas->update($request->all());
        return $tugas;
    }

    public function destroy($id) {
        return Tugas::destroy($id);
    }
}

