@props([
    'method' => 'POST',
    'action' => '',
    'alternate' => ''
])

<form action="{{ $action }}" method="{{$method=='GET' ? 'GET' : $method}}">
    @csrf
    @if(isset($alternate) && $alternate!='')
        @method($alternate)
    @endif
    {{$slot}}
</form>
