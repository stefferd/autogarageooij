<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('meta') | {{ Config::get('statics.slogan') }}</title>
<meta name="description" content="{{ Config::get('statics.customer') }} | @yield('description')" />
<meta name="robots" content="index, follow" />
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="/apple-touch-icon-precomposed.png">
<meta property="og:title"  content="@yield('meta') | {{ Config::get('statics.customer') }} | {{ Config::get('statics.slogan') }}" />
<meta property="og:image"  content="http://www.{{ Config::get('statics.customer_url') }}/public/assets/build/img/juifconsultancy-logo.png" />
<meta property="og:description"  content="{{ Config::get('statics.customer') }} | @yield('description')" />
<meta property="og:site_name" content="{{ Config::get('statics.customer_url') }}" />
<meta property="og:url" content="http://www.{{ Config::get('statics.customer_url') }}/{{ str_replace(' ', '-', strtolower($page->path)) }}" />

<link rel="stylesheet" href="{{ URL::asset('assets/build/css/main.css') }}" />
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-64947338-1', 'auto');
    ga('send', 'pageview', {
        page: '/{{$page->path}}',
        title: '{{$page->title}}}'
    });

</script>
<meta name="google-site-verification" content="knExrsr_B8LqsVEdO70i-evras1lojAajJRSfbvwW3Y" />
