@extends('layouts.app')
@section('content')

<style>
    /* .card {
        margin-left: 400px;
        text-decoration: none;
        width: 500px;
    } */

    .container-fluid {
        width: 600px;
    }

    .list {

        list-style: none;

    }

    #create {
        padding-left: 2px;
    }

    #btn {
        border-radius: 50%;
        color: white;
        font-size: 16px;
        padding-left: 3px;
        width: 90%;
        margin-left: 5%;
        font-style: italic;
        line-height: 15px;
        box-shadow: 5px 5px 5px rgba(68, 68, 68, 0.6);
        cursor: pointer;

    }

    #edit {
        border-radius: 50%;
        color: blue;
        cursor: pointer;
        box-shadow: 5px 5px 5px rgba(68, 68, 68, 0.6);
        height: 40%;
    }

</style>

<div class="container-fluid border p-3">

    <div class="border">
        <p class="text-center text-capitalize mb-1">this is your todo list</p>
    </div>
    <div class="border mt-2 text-center">
        <!-- <a href="/todos/create"><button
                class="btn btn-primary btn-block btn-outline-success mt-2 mb-2 lead text-capitalize" id="btn">
                <span class="fa fa-plus-square"></span></button></a> -->
                 <a href="/todos/create" class=" ">
                         
                         <span class="fa fa-2x fa-plus-circle"></span></a>
                

    </div>
    <div>
        <x-alert />
    </div>

    <div class=" border mt-2 ">
        <div class=" mt-1 ">

            <ul class="list ">
                @forelse( $todos as $todo)
                    <li class="d-flex justify-content-between p-2">

                        <div class="btn">
                            <a href="{{ '/todos/'.$todo->id.'/edit' }}"
                                class="" id="edit">
                                <span class="fa fa-lg fa-pencil-square-o"></span>
                            </a>
                        </div>
                        @if($todo->completed)
                            <strike>
                                <a href="{{ route('todo.show',$todo->id) }}">
                                    {{ $todo->title }}</a>
                            </strike>
                        @else
                            <a href="{{ route('todo.show',$todo->id) }}">
                                {{ $todo->title }}</a>
                        @endif
                        <div>
                            @if($todo->completed)
                                <a href="" class="btn   " onclick="
                                    event.preventDefault();
                                     document.getElementById({{ $todo->id }})
                                    .submit();">
                                    <span class="fa fa-lg fa-close"></span></a>
                                <form action="{{ route('todo.incomplete',$todo->id) }}"
                                    style="display:none" method="post" id="{{ $todo->id }}">
                                    @csrf
                                    @method('put')
                                </form>


                            @else
                                <a href="" class="btn  text-primary" onclick="event.preventDefault();
                                    document.getElementById({{ $todo->id }})
                                    .submit();">
                                    <span class="fa fa-bell"></span></a>
                                <form action="{{ route('todo.complete',$todo->id) }}"
                                    style="display:none" method="post" id="{{ $todo->id }}">
                                    @csrf
                                    @method('put')
                                </form>
                            @endif




                            <a href="" class="btn-outline-warning  text-danger" onclick="event.preventDefault();
                            if(confirm('are you sure you want to delete this')){
                                    document.getElementById('form-delete-{{ $todo->id }}')
                                    .submit();
                                    }">
                                <span class="fa fa-2x fa-trash-o"></span></a>
                            <form action="{{ route('todo.delete',$todo->id) }}"
                                style="display:none" method="post"
                                id="{{ 'form-delete-'.$todo->id }}">
                                @csrf
                                @method('patch')
                            </form>
                        </div>
                    </li>

                @empty
                    <p>no task created create one please</p>
                @endforelse
           
            </ul>
        </div>
    </div>
</div>
@endsection
