<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;

class SettingsController extends Controller
{
    public function get_setting_specific($variablename)
    {
        $setting  = Settings::where('variable', $variablename)->first();
        return $setting->value;
    }
    public function getSettings()
    {
        return Settings::all();
    }
    public function editsetting(Request $request)
    {
        $update = Settings::find($request['id']);
        $update->value = $request['value'];
        $update->save();
        return response(json_encode(["Success"=>"to get update"]));
    }
}
