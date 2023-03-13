<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class DatabaseController extends Controller
{
    // Get Database data on User panel.
    public function getDatabase() {
        $database = User::find()-> databases;
        foreach ($database as $value) {
            dd($value);
        }
        
        return "test";
    }
}
