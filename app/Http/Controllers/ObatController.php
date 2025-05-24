<?php

namespace App\Http\Controllers;

use App\Models\obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(obat::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = obat::create($request->all());
    return response()->json(['message' => 'Obat ditambahkan', 'data' => $data], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
         return response()->json(Obat::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
         $obat = Obat::findOrFail($id);
        $obat->update($request->all());
        return response()->json(['message' => 'Obat diperbarui', 'data' => $obat]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
          Obat::destroy($id);
            return response()->json(['message' => 'Obat dihapus']);
    }
}
