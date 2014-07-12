@if(Session::has('flash.alerts'))
    @foreach(Session::get('flash.alerts') as $alert)

        <div class='alert alert-{{ $alert['level'] }}'>
            <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&times;</button>

            @if( ! empty($alert['title']))
                <div><strong>{{ $alert['title'] }}</strong></div>
            @endif

            {{ $alert['message'] }}
        </div>

    @endforeach
@endif

