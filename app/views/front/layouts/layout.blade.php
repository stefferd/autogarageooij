<!doctype html>
<html lang="nl">
<head>
    @include('front.includes.head')
</head>
<body class="{{$page->path}}">
    <div class="hero">
        <div class="row header">
            <div class="small-12 medium-7 columns">
                &nbsp;
            </div>
            <div class="small-12 medium-5 columns">
                <div class="nav-bar">
                    <ul class="button-group">
                        @if (isset($menuItems))
                            @foreach($menuItems as $item)
                                <li>
                                    <a href="/{{$item->path}}">{{$item->path}}</a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="row">
            @if ($page->type == 2)
                <div class="medium-4 columns">
                    <p>@yield('content')</p>
                    <address>
                        <abbr title="Mobile">M:</abbr> <a href="tel:{{Settings::where('key', '=', 'contact_mobile')->first()->value }}" title="{{Settings::where('key', '=', 'contact_mobile')->first()->value }}">{{Settings::where('key', '=', 'contact_mobile')->first()->value }}</a><br />
                        <abbr title="LinkedIn">T:</abbr> <a href="tel://{{Settings::where('key', '=', 'contact_phone')->first()->value }}" title="{{Settings::where('key', '=', 'contact_phone')->first()->value }}">{{Settings::where('key', '=', 'contact_phone')->first()->value }}</a><br />
                        <abbr title="E-mail">E:</abbr> <a href="mailto:{{Settings::where('key', '=', 'contact_email')->first()->value }}" title="{{Settings::where('key', '=', 'contact_email')->first()->value }}">{{Settings::where('key', '=', 'contact_email')->first()->value }}</a><br />
                        <abbr title="Website">W:</abbr> <a href="http://{{Settings::where('key', '=', 'contact_website')->first()->value }}" title="{{Settings::where('key', '=', 'contact_website')->first()->value }}">{{Settings::where('key', '=', 'contact_website')->first()->value }}</a><br />
                    </address>
                </div>
                <div class="medium-8 columns">
                    @yield('contact-form')
                </div>
            @else
                <div class="medium-12 columns">
                  <h1>@yield('title')</h1>
                  <p>@yield('content')</p>
                </div>
            @endif
        </div>
    </div>
    <div class="footer">
      @include('front.includes.footer')
    </div>
</body>
</html>