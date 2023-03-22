<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class KeywordController extends Controller
{
    // Get Database data on User panel.
    public function getkeywords()
    {
        // session user id find('')
        $keywords = User::find(1)-> keywords;
        $data = [];
        foreach ($keywords as $value) {
            array_push($data, $value);
        }
        return $data;
    }
    public function addkeywords(Request $request)
    {
        // session user id find('')
        $keywords = User::find(1)-> keywords;
        $data = [];
        foreach ($keywords as $value) {
            array_push($data, $value);
        }
        return $data;
    }
}
