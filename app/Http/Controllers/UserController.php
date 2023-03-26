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
      $newuser->role = 0;
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
      $users = User::where('role', 0)->get();
      return  $users;
    }
    public function loginuser (Request $request)
    {
      $username = $request['username'];
      $password =$request['password'];
      
      try {
        $user = User::where('username', $username)->first();

        if($user->count()) {
          if(Hash::check($password, $user->password)) {
              return $user->role;
          }
        }
        return -1;
      } catch (\Throwable $th) {
        return -2;
      }
    }
}
