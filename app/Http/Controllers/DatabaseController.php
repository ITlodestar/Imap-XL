<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Database;


class DatabaseController extends Controller
{
    // Get Database data on User panel.
    public function getdatabase(Request $request)
    {
        // session user id find('')
        $database = User::find(1)->databases;
        $data = [];
        foreach ($database as $value) {
            array_push($data, $value);
        }
        return $data;
    }

    public function fileUpload(Request $request)
    {

        $request->validate([
            'file' => 'required|mimes:txt|max:2048'
        ]);

        $dataupload = new Database;

        $comment = json_decode($request['comment']);

        if ($request->file()) {

            $file_name = time() . "_" . $request->file->getClientOriginalName();
            $file_path = $request->file('file')->storeAs('uploads', $file_name, 'public');

            // session value
            $dataupload->user_id = 1;

            $dataupload->name = $request->file->getClientOriginalName();
            $dataupload->filename = $file_name;
            $dataupload->comment = $comment->value;

            $dataupload->created = time();
            $dataupload->updated = time();
            $dataupload->save();

            return $file_name;
        }
    }
    public function setProgress(Request $request)
    {

        $id = json_decode($request['id']);
        $user = Database::find($id);
        $user->status = 1; 

        $user->save();

        return response()->json(['success' => 'Upload Progress']);
    }
}