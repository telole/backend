<?php

namespace App\Http\Controllers;

use App\Models\kunjungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KunjunganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = kunjungan::with(['petugas', 'people'])->get();
        return response()->json($data);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            "tanggal" => "required",
            "keluhan" => "required",
            "diagnosa" => "required",
            "tindakan" => "required",
            "jam" => "required"
        ]);

        $data['user_id'] = Auth::id();

        $data = kunjungan::create($data);

        return response()->json([$data]);

    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = kunjungan::with(['people', 'petugas'])->findOrFail($id);
        return response()->json([
            'data' => $data
        ]); 


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {      
          $user = Auth::user();

    if ($user->role !== 'petugas') {
        return response()->json([
            'message' => 'Unauthorized – hanya petugas yang diizinkan.'
        ], 403);
    }

    $kunjungan = kunjungan::findOrFail($id);

    $data = $request->except('petugas_id');
    $data['petugas_id'] = $user->id;

    $kunjungan->update($data);

    return response()->json([
        'message' => 'updated',
        'data' => $kunjungan
    ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
     kunjungan::destroy($id);
     return response()->json(['message' => 'success']);
    }
}
