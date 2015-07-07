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
