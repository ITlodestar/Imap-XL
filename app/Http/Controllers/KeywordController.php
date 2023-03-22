<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Userkeywords;
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
        $arrayKeys = $request['newkeys'];
        foreach ($arrayKeys as $value) {
            $newkey = new Userkeywords;
            $newkey->user_id = 1; // user id from sesson
            $newkey->keyword =  $value;
            $newkey->save();
        }
        return json_encode(['success', "Add new keyword"]);
    }
    public function deleteKeywords(Request $request)
    {
        $newkey = Userkeywords::find($request['id']);
        $newkey->delete();
        return json_encode(['success', "delete new keyword"]);
    }
}
