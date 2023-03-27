<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Database;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\WorkertaskController;

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
        // $content=$this->filecontrol($user, 500);
       
        // $this->setworktask($user, $content);

        return response()->json(['success' => 'Upload Progress']);
    }

    // private function filecontrol($database, $line)
    // {
    //     $lines = [];
    //     $content = [];
    //     $handle = fopen(storage_path('app/public/uploads/' . $database->filename), "r+");
       
    //     if ($handle) {
    //         $counter = 0;
    //         while (( $line = fgets( $handle ) ) !== false) {
    //             $putline = trim($line);
    //             array_push($content, str_replace(array("\r", "\n"), '', $putline));
               
    //             $counter++;
    //             if ($counter >= 0 && $counter <= 10) {
    //                 continue;
    //             }
    //             array_push($lines, $line);
    //         }
    //         if(fgets($handle) == false) {
    //             $database->status = 2;
                
    //             $database->save();
    //         }
    //     }

    //     ftruncate($handle, 0);
        
    //     // Write the updated array back to the file
    //     fwrite($handle, implode($lines));

    //     fclose($handle);
        
    //     return $content;
    // }
    // // Set Workertask.
    // private function setworktask($database, $content)
    // {
    //     $group = [];
    //     $index = 0;
    //     $total = 0;
       
    //     $settings = new SettingsController;
    //     $size = $settings->get_setting_specific('task_0_size');

    //     foreach ($content as $value) {
    //         array_push($group, $value);
    //         $total++;
    //         $index++;

    //         if ($size == $index || $total == count($content)) {
    //             $worktask = new WorkertaskController;
    //             $worktask->setCreateworktask($database->id, json_encode($group));
    //             $index = 0;
    //             $group = [];
    //         }
    //     }
    // }
}