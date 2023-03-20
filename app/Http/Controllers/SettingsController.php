<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;

class SettingsController extends Controller
{
    public function get_settings($variable_name) {
        $Setting  = Settings::where('variable', $variable_name)->first();
        return $Setting->value;
    }
}
