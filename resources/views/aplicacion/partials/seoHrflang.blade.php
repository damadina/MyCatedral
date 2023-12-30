@foreach ($metas as $meta )

    {!!$meta->meta!!}
@endforeach







@if($locale!='es')
    <link rel="alternate" hreflang="x-default" href="{{asset($slugES)}}" />
@endif
