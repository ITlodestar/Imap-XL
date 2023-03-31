<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emailmodel;

class EmailController extends Controller
{
    public function Saveresult(Request $request)
    {
        $databaseid = $request['database_id'];

        foreach ($request['data'] as $item) {
            $email = new Emailmodel;
            $email->database_id = $databaseid;
            $email->email = $item['email'];
            $email->username = $item['username'];
            $email->password = $item['password'];
            $email->host = $item['host'];
            $email->port = $item['port'];
            $email->protocol = $item['protocol'];
            $email->status = 1;
            $email->counter = 1;
            $email->created = time();
            $email->last_check = time();
            $email->save();
        }
        return json_encode(['success', "Save task's  result"]);
    }
}
