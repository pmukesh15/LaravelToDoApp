<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ToDo;
use Auth;


class ToDoActionController extends Controller
{
    public function createToDo(Request $request){
        $toDo          = new ToDo;
        $toDo->user_id = auth()->user()->id; 
        $toDo->todo    = $request->todoName;
        $toDo->is_done = 0;
        $toDo->save();
        return redirect()->route('home'); 
    }
    public function updateStatus($id){
        $existingStatus = ToDo::where('id',$id)->pluck('is_done')->first();
        $existingStatus = $existingStatus?0:1;
        ToDo::where('id', $id)
            ->update(['is_done' => $existingStatus]);
        return redirect()->route('home');
    }
}
