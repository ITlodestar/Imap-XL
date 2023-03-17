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
            $dataupload->filename = $request->file->getClientOriginalName();
            $dataupload->comment = $comment->value;

            $dataupload->created = time();
            $dataupload->updated = time();
            $dataupload->save();

            return response()->json(['success' => 'File uploaded successfully.']);
        }
    }
    public function setProgress(Request $request)
    {

        $id = json_decode($request['id']);
        $user = Database::find($id);
        $user->status = 1;
        $user->save();

        $content = [];

        $handle = fopen(storage_path('app/public/mail.txt'),"r");
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                array_push($content,str_replace(array("\r", "\n"), '', $line));
            }
            fclose($handle);
        }
        $group = [];
        $index = 0;
        $total = 0;
        $settings = new SettingsController;
        $size = $settings->get_settings('task_0_size');
       
        foreach ($content as  $value) {
            array_push($group, $value);
            $total ++;
            $index ++;

            if ($size == $index || $total == count($content)) {
                $worktask = new WorkertaskController;
                $worktask->setCreateworktask($id, json_encode($group));
                $index = 0;
                $group = [];
            }
        }
        
        return response()->json(['success' => 'Create work task.']);
    }
}