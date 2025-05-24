<?php

namespace App\Http\Controllers;

use App\Models\artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(artikel::with('creator')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
          $validated = $request->validate([
        'judul' => 'required|string|max:255',
        'isi' => 'required|string',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    if ($request->hasFile('gambar')) {
        $path = $request->file('gambar')->store('artikel', 'public');
        $validated['gambar'] = $path;
    }

    $validated['penulis_id'] = $request->user()->id;

    $artikel = artikel::create($validated);

    return response()->json([
        'message' => 'Artikel berhasil dibuat',
        'data' => $artikel
    ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return response()->json(artikel::with('creator')->findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $artikel = Artikel::findOrFail($id);
        $artikel->update($request->all());
        return response()->json(['message' => 'Artikel diperbarui', 'data' => $artikel]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = artikel::find($id);
        if(!$data) {
            return response()->json('kosong');
        }
        // artikel::destroy($id);
        $data->delete();
        return response()->json([
            'message' => 'Success'
        ]);
    }
}
