@if(Session::has('flash.alert'))
    {{ Session::get('flash.alert') }}
@endif