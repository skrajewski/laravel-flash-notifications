@if(Session::has('flash.alerts'))
    @foreach(Session::get('flash.alerts') as $alert)

          @if($alert['important'])
            <div class='alert alert-{{ $alert['level'] }} alert-important'>

            <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&times;</button>
          @else
            <div class='alert alert-{{ $alert['level'] }}'>

          @endif

          @if( ! empty($alert['title']))
              <div><strong>{{ $alert['title'] }}</strong></div>
          @endif

            {{ $alert['message'] }}
        </div>

    @endforeach
@endif


@push("scripts")
<script>
    $( document).ready( function(){
      $('div.alert').not('.alert-important').delay(3000).slideUp(300);
    });
</script>
@endpush
