<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\AuditLog;

class AssetController extends Controller
{
    public function index()
    {
        $assets = Asset::where('user_id', auth()->id())->latest()->get();
        return view('employee.assets', compact('assets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'device_type' => 'required|string|max:255',
            'device_model' => 'required|string|max:255',
            'operating_system' => 'required|string|max:255',
        ]);

        Asset::create([
            'user_id' => auth()->id(),
            'device_type' => $request->device_type,
            'device_model' => $request->device_model,
            'operating_system' => $request->operating_system,
            'ownership' => 'BYOD',
        ]);

        AuditLog::create([
            'user_id' => auth()->id(),
            'action' => 'Device Registered',
            'details' => 'Registered a BYOD asset: ' . $request->device_model . ' (' . $request->device_type . ')'
        ]);

        return back()->with('success', 'Device successfully registered!');
    }

    public function adminAudits()
    {
        $assets = Asset::with('user')->latest()->get();
        $logs = AuditLog::with('user')->latest()->get();
        return view('admin.audits', compact('assets', 'logs'));
    }
}