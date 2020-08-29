@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border">
                <div class="card-header text-center">Dashboard</div>

                <div class="card-body text-center">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                
                

                    <!-- @include('layouts.flash'); -->
                    <x-alert>
                    <p>here is the response from slot</p>
                    </x-alert>

                    <form action="/upload" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="image">
                        <input type="submit" value="upload">
                    </form>


                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
