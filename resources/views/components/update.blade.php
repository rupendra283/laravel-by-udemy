<p>
   {{empty (trim ($slot)) ? 'Added' : $slot }} {{ $date->diffForHumans() }}
    {{-- <b>by {{ $name }} </b> --}}
    @if (isset($name))
    <b>  by {{ $name }} </b>
    @endif
</p>
