<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){

        $todos=auth()->user()->todos()->orderBy('completed')->get();
        //this will show all todos accoreding to logged in user
        

        return view('todos.index',compact('todos'));
    }

    public function create(){

        return view('todos.create');
    }

    public function store(Request $request){

        $request->validate([

            'title'=>'required|max:255',
        ]);

        auth()->user()->todos()->create($request->all());
        //this will create todos accoreding to logged in user

        return redirect(route('todo.index'))->with('message','To-Do Created Succesfuly');

    }

    public function show(Todo $todo){

        return view('todos.show',compact('todo'));

    }

    public function edit(Todo $todo){

        
        return view('todos.edit',compact('todo'));
    }

    public function update(Request $request,Todo $todo){

        $request->validate([

            'title'=>'required|max:255',
        ]);
        $todo->update(['title'=>$request->title]);

        return redirect(route('todo.index'))->with('message','Updated!');

    }

    public function complete(Todo $todo){

        $todo->update(['completed'=>true]);
        return redirect()->back()->with('message','Task Marked as Completed!');
    }

    public function incomplete(Todo $todo){

        $todo->update(['completed'=>false]);
        return redirect()->back()->with('message','Task Marked as Incompleted!');
    }
    public function delete(Todo $todo){
        $todo->delete();
        return redirect()->back()->with('message','Task Deleted!');

    }
}