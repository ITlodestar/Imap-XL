<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Database;

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

    public function fileUpload(Request $request) {
        
        
        $request->validate([
            'file' => 'required|mimes:txt|max:2048'
         ]);
        
         $data = new Database; 
         $comment =   json_decode($request['comment']) ;
      
         if($request->file()) {
            
            $file_name = time().'_'.$request->file->getClientOriginalName();
            $file_path = $request->file('file')->storeAs('uploads', $file_name, 'public');

            // session value
            $data->user_id= 1;  
            $data->name = $request->file->getClientOriginalName();
            $data->filename =  $request->file->getClientOriginalName();
            $data->comment = $comment->value;
         
            $data->created = time();
            $data->updated = time();
            $data->save();
            
             return response()->json(['success'=>'File uploaded successfully.']);
             
         }
    }
}
