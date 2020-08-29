<div>

    @if(session()->has('message'))
        {{ $slot }}
        <div class="alert alert-success text-center">
            {{ session()->get('message') }}
        </div>
    @elseif(session()->has('error'))
        {{ $slot }}
        <div class="alert alert-danger text-center">
            {{ session()->get('error') }}
        </div>


    @endif

    @if($errors->any())
        <div class="alert alert-danger text-center">

            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
</div>


