<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class StoreStatusController extends Controller
{
    public function toggle(Request $request)
    {
        $status = $request->input('status'); // 'on' or 'off'

        Setting::updateOrCreate(
            ['key' => 'store_status'],
            ['value' => $status]
        );

        return back()->with('success', "Store status updated to: $status");
    }

    public function getStatus()
    {
        $status = Setting::where('key', 'store_status')->value('value') ?? 'on';

        return response()->json(['status' => $status]);
    }
}
