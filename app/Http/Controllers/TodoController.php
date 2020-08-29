<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use Illuminate\Http\FormRequest;
use Illuminate\Http\Request;

use App\todo;

class TodoController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }


    public function index(){

        // $todos = todo::orderby('completed')->get();

        $todos = auth()->user()->todos()->orderby('completed')->get();

        // return view('todos.index')->with(['todos'=>$todos]);
        return view('todos.index',compact('todos'));
    }


    public function create(){

         
        return view('todos.create');
    }




    public function store(TodoCreateRequest $request){

    //     $request->validate([
    //    'title'=>'required | max:255',
  
    //     ]);
    // $userid = Auth()->id();
    // $request['user_id']= $userid;
    // dd(auth()->user()->todos());

    // todo::create($request->all());

    auth()->user()->todos ()->create($request->all());

    return redirect()->back()->with('message','Todo created');

    }


    public function edit(todo $todo){
        // $todo = todo::find($id);
       
        return view('todos.edit',compact('todo'));
    }


    public function update(TodoCreateRequest $request, todo $todo){

        $todo->update(['title'=>$request->title,
        'description'=>$request->description,
        
        ]);

        return redirect(route('todos'))->with('message','updated successfully');
    }


    public function complete(todo $todo){

         $todo->update(['completed'=>true]);

         return redirect(route('todos'))->with('message','todo marked as completed');
    }


     public function incomplete(todo $todo){

     $todo->update(['completed'=>false]);

     return redirect(route('todos'))->with('message','todo marked as incompleted');
     }


      public function delete(todo $todo){

      $todo->delete();
    //   return redirect()->back()->with('message','todo deleted');

      return redirect(route('todos'))->with('message','todo deleted');
      }

      public function show(todo $todo){

// dd($todo);
       return view('todos.show',compact('todo'));


      }
 }
