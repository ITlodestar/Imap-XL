<?php

namespace App\Http\Controllers;

use App\Models\Database;
use Illuminate\Http\Request;
use App\Models\Workertask;


class WorkertaskController extends Controller
{
    public function setCreateworktask($databaseid, $taskbody) {
    
        $newTask = new Workertask;
    
        $newTask->database_id = $databaseid;
        $newTask->task_type = 0;
        $newTask->task_body = $taskbody;
        $newTask->status = 0;
        $newTask->timestart =  time();
    
        $newTask->save();
    }

    public function getWorktask(Request $request, string $id) {

        $databaseid = $id; 

        $worktasks = Database::find($databaseid)->workertask;
        $tasks = [];
        foreach ($worktasks as $item) {
            array_push($tasks, $item);
        }
        return $tasks;
    }
}
