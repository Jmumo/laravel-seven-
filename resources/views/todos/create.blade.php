@extends('layouts.app')
@section('content')

<style>
    .card {
        margin-left: 400px;
        width: 500px;

    }

</style>

<div class="card border-red">
    <div class="card-header">
        <p class="active text-center text-capitalize mb-1">this the todo header</p>

        <x-alert>
            <p>here is the response from slot</p>
        </x-alert>
    </div>
    <div class="card-body">
        <!-- <input class="btn btn-dark  " value="submit" type="submit" /> -->
        <a href="/todos" class=""><span class="fa fa-lg fa-arrow-left"></span></a>
        <form action="/todos/create" class="form-group text-center" method="post">
            @csrf
            <label for="title" class="alert text-capitalize mb-0">todo title</label>
            <input type="text" class="form-control" name="title"><br>
            <textarea name="description" id="" cols="45" rows="5" class="form-control"></textarea><br>
             

            <input class="btn btn-dark mt-3" value="submit" type="submit" />

        </form>

    </div>
  
       
</div>



@endsection
