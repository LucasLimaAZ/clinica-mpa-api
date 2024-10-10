<?php

namespace App\Http\Controllers;

use App\Models\Medication;
use Illuminate\Http\Request;

class MedicationsController extends Controller
{
    public function index()
    {
        $medications = Medication::all();
        return response()->json($medications, 200);
    }

    public function store(Request $request)
    {
        $medication = Medication::create($request->all());

        return response()->json([
            'medication' => $medication,
            'message' => 'Medication created'
        ]);
    }

    public function show(string $id)
    {
        $medication = Medication::find($id);

        if (!$medication) {
            return response()->json(['message' => 'Medication not found'], 404);
        }

        return response()->json($medication, 200);
    }

    public function update(Request $request, string $id)
    {
        $medication = Medication::find($id);
        $medication->update($request->all());
        $medication->save();

        return response()->json(['message' => 'Medication updated']);
    }

    public function destroy(string $id)
    {
        $medication = Medication::find($id);

        if (!$medication) {
            return response()->json(['message' => 'Medication not found'], 404);
        }

        $medication->delete();

        return response()->json(['message' => 'Medication deleted successfully'], 200);
    }

    public function countMedications()
    {
        $count = Medication::count();

        return response()->json(['total' => $count], 200);
    }
}
