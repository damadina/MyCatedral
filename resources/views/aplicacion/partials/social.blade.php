
<meta property="og:title" content="{{$elemento->seoTitle}}">
<meta property="og:type"  content="article">
<meta property="og:url"   content="{{ URL::current() }}">
<meta property="og:image"         content="{{asset('storage/originales/'.$elemento->urlPortada)}}">
<meta property="og:description" content="{{$elemento->seoMeta}}">
<meta property="og:image:type" content="image/jpeg">
<meta property="og:site_name" content="{{__('Catedral de Santiago de Compostela')}}">
<meta property="article:publisher" content="https://www.facebook.com/mascompostela/">

<meta name="twitter:card" content="summary_large_image"/>
<meta name="twitter:title" content="{{ $elemento->seoTitle }}"/>
<meta name="twitter:description" content="{{ $elemento->seoMeta }}"/>
<meta name="twitter:image" content="{{asset('storage/originales/'.$elemento->urlPortada)}}"/>


