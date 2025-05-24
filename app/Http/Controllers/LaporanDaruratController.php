<?php

namespace App\Http\Controllers;

use App\Models\laporan_darurat;
use Illuminate\Http\Request;

class LaporanDaruratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(laporan_darurat::with('pelapor')->get());
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
    'deskripsi' => 'required|string',
    'lokasi' => 'nullable|string|max:100',
    'waktu_kejadian' => 'required|date_format:Y-m-d',
    ]);

    $laporan = laporan_darurat::create([
        'pelapor_id' => $request->user()->id,
        'deskripsi' => $validated['deskripsi'],
        'lokasi' => $validated['lokasi'] ?? null,
        'waktu_kejadian' => $validated['waktu_kejadian'],
    ]);

    return response()->json([
        'message' => 'Laporan berhasil dikirim',
        'data' => $laporan
    ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
         return response()->json(laporan_darurat::with('pelapor')->findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
          $laporan = laporan_darurat::findOrFail($id);
          $laporan->update($request->only('status'));
          return response()->json(['message' => 'Status diperbarui', 'data' => $laporan]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
         laporan_darurat::destroy($id);
        return response()->json(['message' => 'Laporan dihapus']);
    }
}
