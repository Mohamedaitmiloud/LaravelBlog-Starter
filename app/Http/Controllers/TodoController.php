<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    public function getTodos(){
        $todos = Todo::all();
        return response()->json(['etat'=>true,'todos'=>$todos]);
        
    }
   
    public function store(Request $request)
    {
        $todo = Todo::create([
            'body' => $request->body,
        ]);

        return response()->json(['etat'=>true,'id'=>$todo->id]);
    }

    public function markDone($id){
        $todo = Todo::find($id);
        $todo->isCompleted = 1;
        $todo->save();
        return response()->json(['etat'=>true]);
    }

    public function destroy($id)
    {
        $todo = Todo::find($id);
        $todo->delete();
        return response()->json(['etat'=>true]);
    }
}
