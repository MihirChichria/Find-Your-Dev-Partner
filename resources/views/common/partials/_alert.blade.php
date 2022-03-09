@if($errors->any())
    <x-alert alert="error">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="red">{{$error}}</li>
            @endforeach
        </ul>
    </x-alert>
@endif
@if(Session::has('success'))
    <x-alert alert="success">{{Session::get('success')}}</x-alert>
@endif

@if(Session::has('error'))
    <x-alert alert="error" >{{Session::get('error')}}</x-alert>
@endif
