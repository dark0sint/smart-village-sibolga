<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\EmergencyReport;

class HealthController extends Controller
{
    public function getAppointments(Request $request)
    {
        $appointments = Appointment::where('user_id', $request->user()->id)->get();
        return response()->json($appointments);
    }

    public function bookAppointment(Request $request)
    {
        $appointment = Appointment::create($request->all());
        return response()->json($appointment, 201);
    }

    public function reportEmergency(Request $request)
    {
        $report = EmergencyReport::create($request->all());
        // Trigger notification or dispatch
        return response()->json($report, 201);
    }
}
