@if (env('APP_ENV') == 'production')
<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZJDWZKPEHZ"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-ZJDWZKPEHZ');
    </script>
    <meta name="robots" content="index">
@else
    <meta name="robots" content="noindex">
@endif
