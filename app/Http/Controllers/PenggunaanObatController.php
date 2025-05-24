<?php

namespace App\Http\Controllers;

use App\Models\obat;
use App\Models\penggunaan_obat;
use Illuminate\Http\Request;

class PenggunaanObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
         $data = penggunaan_obat::with(['kunjungan', 'obat'])->get();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

         $data = penggunaan_obat::create($request->all());
         return response()->json(['message' => 'Penggunaan obat dicatat', 'data' => $data], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
           $data = penggunaan_obat::with(['kunjungan', 'obat'])->findOrFail($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        // if(penggunaan_obat::)
          penggunaan_obat::destroy($id);
            return response()->json(['message' => 'Data penggunaan obat dihapus']);
    }
}
