<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function index()
    {
        return Materi::with(['user', 'buku'])->get();
    }

    public function store(Request $request)
    {
        return Materi::create($request->all());
    }

    public function show($id)
    {
        return Materi::with(['user', 'buku'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $materi = Materi::findOrFail($id);
        $materi->update($request->all());
        return $materi;
    }

    public function destroy($id)
    {
        return Materi::destroy($id);
    }
}
