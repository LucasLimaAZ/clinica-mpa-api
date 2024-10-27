<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExamRequest;

class ExamRequestsController extends Controller
{
    public function index()
    {
        $examRequests = ExamRequest::with('patient:id,full_name,phone,file_location')->get();
        return response()->json($examRequests, 200);
    }

    public function store(Request $request)
    {
        $examRequest = ExamRequest::create($request->all());

        return response()->json([
            'examRequest' => $examRequest,
            'message' => 'ExamRequest created'
        ]);
    }

    public function show(string $id)
    {
        $examRequest = ExamRequest::find($id);

        if (!$examRequest) {
            return response()->json(['message' => 'ExamRequest not found'], 404);
        }

        return response()->json($examRequest, 200);
    }

    public function update(Request $request, string $id)
    {
        $examRequest = ExamRequest::find($id);
        $examRequest->update($request->all());
        $examRequest->save();

        return response()->json(['message' => 'ExamRequest updated']);
    }

    public function destroy(string $id)
    {
        $examRequest = ExamRequest::find($id);

        if (!$examRequest) {
            return response()->json(['message' => 'ExamRequest not found'], 404);
        }

        $examRequest->delete();

        return response()->json(['message' => 'ExamRequest deleted successfully'], 200);
    }

    public function countExamRequests()
    {
        $count = ExamRequest::count();

        return response()->json(['total' => $count], 200);
    }
}
