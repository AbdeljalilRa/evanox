<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Update store settings.
     */
    public function updateStoreSettings(Request $request)
    {
        $request->validate([
            'store_status' => 'required|in:on,off',
        ]);

        try {
            Setting::set('store_status', $request->store_status);
            
            return redirect()->back()->with('success', 'Store settings updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update store settings.');
        }
    }
}