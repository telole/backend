<?php

namespace App\Http\Controllers;

use App\Models\kunjungan;
use Illuminate\Http\Request;

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
        $data = kunjungan::create($request->all());
        return response()->json([
            'message' => 'success Add Visiting',
            'data' => $data
        ]);
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
        $kunjungan = kunjungan::findOrFail($id);
        $kunjungan->update($request->all());  // panggil update() pada instance
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
