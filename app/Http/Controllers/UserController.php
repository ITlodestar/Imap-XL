<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function adduser(Request $request)
    {
      $newuser = new User;
      
      $newuser->username = $request['username'];
      $randompwd = Str::random(8);
      $newuser->password = Hash::make($randompwd);

      $newuser->save(); 

      $Userinfo = json_encode([
          "username" => $request['username'],
          "created_at" => date('Y-m-d H:i:s'),
          "updated_at" => date('Y-m-d H:i:s')
      ]);
      return $Userinfo;
    }
    public function getuser()
    {
      return User::all();
    }
}
