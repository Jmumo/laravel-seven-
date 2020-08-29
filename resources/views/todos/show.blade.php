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
        <p class="active text-center text-capitalize mb-1">{{ $todo->title }}</p>

    </div>
    <div class="card-body text-center">
@if($todo->description)
        <textarea name="description" id="" cols="45" rows="5" placeholder="{{ $todo->description }}"></textarea><br>
  @endif      <!-- <p>{{ $todo->description }}</p> -->
    </div>
    <a href="/todos" class="btn btn-outline-success btn-sm">back</a>
</div>


@endsection
