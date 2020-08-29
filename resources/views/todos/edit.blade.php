@extends('layouts.app')
@section('content')

<style>
    .card {
        margin-left: 400px;
        width: 500px;
        text-decoration: none;


    }

    .list {
        text-decoration: none !important;
        list-style: none;

    }

    .btn {
        border-radius: 5%;
        font-size: 13px;
        font-style: italic;
        line-height: 15px;
        position: pull-right;
        box-shadow: 5px 5px 5px rgba(68, 68, 68, 0.6);

    }

</style>

<div class="card">
     <div class="card-header">
     <a href="{{route('todos')}}"><span class="fa fa-arrow-left"></span></a>
     
        <!-- <p class="active text-center text-capitalize mb-1">this is your todo list</p> -->
<h3 class="text-capitalize text-center active">update your todo</h3>
    </div> 
  
    <div class="card-body text-center">
    <x-alert/>

        <ul class="list">

        

            <li>
                <form action="{{route('todo.update',$todo->id)}}" class="form-group text-center" method="post">
                    @csrf
                    @method('patch')
                    <label for="title" class="alert text-capitalize mb-0">todo title</label>
                    <input type="text" class="form-control" name="title" value="{{ $todo->title }}"><br>
                    <textarea name="description" id="" cols="45" rows="5"
                        placeholder="">{{ $todo->description }}</textarea><br>
                    <input class="btn btn-dark mt-2" value="submit" type="submit" />
                </form>
            </li>

        </ul>
    </div>
</div>
@endsection
