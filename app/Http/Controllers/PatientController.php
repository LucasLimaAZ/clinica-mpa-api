<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all();
        return response()->json($patients, 200);
    }

    public function store(Request $request)
    {
        $patient = Patient::create($request->all());

        return response()->json([
            'patient' => $patient,
            'message' => 'Patient created'
        ]);
    }

    public function show(string $id)
    {
        $patient = Patient::find($id);

        if (!$patient) {
            return response()->json(['message' => 'Patient not found'], 404);
        }

        return response()->json($patient, 200);
    }

    public function update(Request $request, string $id)
    {
        $patient = Patient::find($id);
        $patient->update($request->all());
        $patient->save();

        return response()->json(['message' => 'Patient updated']);
    }

    public function destroy(string $id)
    {
        $patient = Patient::find($id);

        if (!$patient) {
            return response()->json(['message' => 'Patient not found'], 404);
        }

        $patient->delete();

        return response()->json(['message' => 'Patient deleted successfully'], 200);
    }

    public function getPatientsInRange(string $startId, string $endId)
    {
        $patients = Patient::whereBetween('id', [$startId, $endId])
            ->select('id', 'full_name')
            ->get();

        return response()->json($patients, 200);
    }

    public function countPatients()
    {
        $count = Patient::count();

        return response()->json(['total' => $count], 200);
    }
}
