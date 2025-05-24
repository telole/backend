<?php

namespace App\Http\Controllers;

use App\Models\konsultasi;
use Illuminate\Http\Request;

class KonsultasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(konsultasi::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
        'pertanyaan' => 'required|string|max:1000',
        ]);

        $data = Konsultasi::create([
            'user_id' => $request->user()->id,
            'pertanyaan' => $request->input('pertanyaan'),
        ]);

        return response()->json([
            'message' => 'Konsultasi berhasil dikirim',
            'data' => $data
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
         return response()->json(Konsultasi::with('consultation')->findOrFail($id));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = konsultasi::findOrFail($id);
        $data->update($request->only('jawaban'));
        return response()->json(['message' => 'jawaban dikirim', 'data' => $data ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = konsultasi::find($id);
        if(!$data) {
            return response()->json(['message' => 'data null']);
        }

        $data->delete();
        return response()->json([

            'message' => 'berhasil dihapus'
        ]);
    }
}
