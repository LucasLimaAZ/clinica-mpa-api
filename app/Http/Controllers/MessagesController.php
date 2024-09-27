<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return response()->json($messages, 200);
    }

    public function store(Request $request)
    {
        $message = Message::create($request->all());

        return response()->json([
            'created_message' => $message,
            'message' => 'Message created'
        ]);
    }

    public function show(string $id)
    {
        $message = Message::find($id);

        if (!$message) {
            return response()->json(['message' => 'Message not found'], 404);
        }

        return response()->json($message, 200);
    }

    public function update(Request $request, string $id)
    {
        $message = Message::find($id);
        $message->update($request->all());
        $message->save();

        return response()->json(['message' => 'Message updated']);
    }

    public function destroy(string $id)
    {
        $message = Message::find($id);

        if (!$message) {
            return response()->json(['message' => 'Message not found'], 404);
        }

        $message->delete();

        return response()->json(['message' => 'Message deleted successfully'], 200);
    }
}