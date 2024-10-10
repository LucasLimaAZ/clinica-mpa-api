<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use Illuminate\Http\Request;

class PrescriptionsController extends Controller
{
    public function index()
    {
        $prescriptions = Prescription::with('patient')->get();

        return response()->json($prescriptions, 200);
    }

    public function store(Request $request)
    {
        $prescription = Prescription::create($request->all());

        return response()->json([
            'prescription' => $prescription,
            'message' => 'Prescription created'
        ]);
    }

    public function show(string $id)
    {
        $prescription = Prescription::with('patient')->find($id);

        if (!$prescription) {
            return response()->json(['prescription' => 'Prescription not found'], 404);
        }

        return response()->json($prescription, 200);
    }

    public function update(Request $request, string $id)
    {
        $prescription = Prescription::find($id);
        $prescription->update($request->all());
        $prescription->save();

        return response()->json(['prescription' => 'Prescription updated']);
    }

    public function destroy(string $id)
    {
        $prescription = Prescription::find($id);

        if (!$prescription) {
            return response()->json(['prescription' => 'Prescription not found'], 404);
        }

        $prescription->delete();

        return response()->json(['prescription' => 'Prescription deleted successfully'], 200);
    }

    public function countPrescriptions()
    {
        $count = Prescription::count();

        return response()->json(['total' => $count], 200);
    }
}
