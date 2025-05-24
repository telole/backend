<?php

namespace App\Http\Controllers;

use App\Models\chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function getMessagesWithUser($userId) {
        $authId = auth()->id();
        return chat::where(function ($q) use ($authId, $userId) {
            $q->where('pengirim_id', $authId)->where('penerima_id', $userId);
        })->orWhere(function ($q) use ($authId, $userId) {
            $q->where('pengirim_id', $userId)->where('penerima_id', $authId);
        })->orderBy('waktu_kirim')->get();
    }

    public function sendMessage(Request $request)
{
    $request->validate([
        'penerima_id' => 'required|exists:users,id',
        'pesan' => 'required|string|max:1000',
    ]);

    $chat = Chat::create([
        'pengirim_id' => $request->user()->id,
        'penerima_id' => $request->penerima_id,
        'pesan' => $request->pesan,
    ]);

    return response()->json([
        'message' => 'Pesan berhasil dikirim',
        'data' => $chat
    ], 201);
}

}