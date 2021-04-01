@foreach($select_quan as $sl)
    @foreach($select_xa as $slx)
        @if($sl->id == $slx->id)
<p>{{$sl->name}} - {{$slx->name}}</p>
@endif
@endforeach
@endforeach