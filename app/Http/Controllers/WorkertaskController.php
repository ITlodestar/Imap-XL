<?php

namespace App\Http\Controllers;

use App\Models\Database;
use Illuminate\Http\Request;
use App\Models\Workertask;
use Ramsey\Uuid\Uuid;

class WorkertaskController extends Controller
{
    public function setCreateworktask($databaseid, $taskbody) {
    
        $newTask = new Workertask;
        $uuid = Uuid::uuid4()->toString();
        $newTask->database_id = $databaseid;
        $newTask->task_type = 0;
        $newTask->task_body = $taskbody;
        $newTask->status = 0;
        $newTask->uuid = $uuid;
        $newTask->timestart =  time();
    
        $newTask->save();
    }

    public function getallWorktasks(Request $request, string $id) {
        
        $databaseid = $id; 
        $worktasks = [];
        if($databaseid == 'all') {
            $worktasks = Workertask::all();
        }
        else {
            $worktasks = Database::find($databaseid)->workertask;
        }
        
        $tasks = [];
        foreach ($worktasks as $item) {
            array_push($tasks, $item);
        }
        return $tasks;
    }

    public function getWorktask(Request $request) {
       
        $worktasks = Workertask::where("status", 0)->first();
        $worktasks->status = 1;
        $worktasks->save();
        $returnArray = [];

        array_push($returnArray, $worktasks->task_body);
        array_push($returnArray, $worktasks->uuid);
        
        return $returnArray;
    }
}
