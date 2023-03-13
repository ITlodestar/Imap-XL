<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DatabaseController extends Controller
{
    // Get Database data on User panel.
    public function getdatabase(Request $request) {
        // session user id find('')
        $database = User::find(1)-> databases;
        $data = [];
        foreach ($database as $value) {
            array_push($data, $value);
        }
        return $data;
    }
}
