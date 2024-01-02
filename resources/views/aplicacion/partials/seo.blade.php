<title>{{$elemento->seoTitle}}</title>
<meta name="description" content="{{Str::limit($elemento->seoMeta,150)}}">
<link rel="icon" href="{{ asset('storage/images/logo.png') }}">
<link rel="canonical" href="{{url()->current().'/'}}" />
