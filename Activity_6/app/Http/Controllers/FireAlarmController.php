<?php

namespace App\Http\Controllers;

use App\Models\FireAlarm;
use Illuminate\Http\Request;

class FireAlarmController extends Controller
{
    public function index()
    {
        $fireAlarms = FireAlarm::all();
        return view('fire-alarms.index', compact('fireAlarms'));
    }

    public function create()
    {
        return view('fire-alarms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'location' => 'required',
            'status' => 'required|in:Active,Inactive,Faulty',
            'installation_date' => 'required|date',
        ]);

        FireAlarm::create($request->all());
        return redirect()->route('fire-alarms.index')->with('success', 'Fire Alarm added successfully!');
    }

    public function edit(FireAlarm $fireAlarm)
    {
        return view('fire-alarms.edit', compact('fireAlarm'));
    }

    public function update(Request $request, FireAlarm $fireAlarm)
    {
        $request->validate([
            'location' => 'required',
            'status' => 'required|in:Active,Inactive,Faulty',
            'installation_date' => 'required|date',
        ]);

        $fireAlarm->update($request->all());
        return redirect()->route('fire-alarms.index')->with('success', 'Fire Alarm updated successfully!');
    }

    public function destroy(FireAlarm $fireAlarm)
    {
        $fireAlarm->delete();
        return redirect()->route('fire-alarms.index')->with('success', 'Fire Alarm deleted!');
    }
}
