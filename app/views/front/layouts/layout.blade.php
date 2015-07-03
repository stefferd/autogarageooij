<!doctype html>
<html lang="nl">
    <head>
        @include('front.includes.head')
    </head>
    <body class="{{$page->title}}">
        <div class="hero still">
            <div class="row header">
                <div class="small-12 medium-4 large-6 columns">
                    <h1>
                        <a href="/" title="Dexperts - Front-end developer | AngularJS | KnockoutJS | JavaScript | Grunt | Sass">
                            <img src="{{ URL::asset('assets/build/img/dexperts-logo.png') }}" width="200" height="90" alt="Dexperts - Front-end developer | AngularJS | KnockoutJS | JavaScript | Grunt | Sass" />
                        </a>
                    </h1>
                </div>
                <div class="small-12 medium-8 large-6 columns">
                    <div class="nav-bar">
                        <ul class="button-group">
                            <li><a href="{{ URL::route('front.index') }}" class="button">Home</a></li>
                            <li><a href="{{ URL::route('front.portfolio') }}" class="button">Portfolio</a></li>
                            <li><a href="{{ URL::route('front.blog') }}" class="button">Blog</a></li>
                            <li><a href="{{ URL::route('front.contact') }}" class="button">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="large-12 columns intro-text">
                    <p>@yield('title')</p>
                </div>
            </div>
        </div>
        <div class="row">
            @if ($page->type == 2)
                <div class="medium-4 columns">
                    <p>@yield('content')</p>
                    <address>
                        <abbr title="Mobile">M:</abbr> <a href="tel:{{Settings::where('key', '=', 'contact_phone')->first()->value }}" title="{{Settings::where('key', '=', 'contact_phone')->first()->value }}">{{Settings::where('key', '=', 'contact_phone')->first()->value }}</a><br />
                        <abbr title="E-mail">E:</abbr> <a href="mailto:{{Settings::where('key', '=', 'contact_email')->first()->value }}" title="{{Settings::where('key', '=', 'contact_email')->first()->value }}">{{Settings::where('key', '=', 'contact_email')->first()->value }}</a><br />
                        <abbr title="Website">W:</abbr> <a href="http://{{Settings::where('key', '=', 'contact_website')->first()->value }}" title="{{Settings::where('key', '=', 'contact_website')->first()->value }}">{{Settings::where('key', '=', 'contact_website')->first()->value }}</a><br />
                        <abbr title="LinkedIn">IN:</abbr> <a href="http://{{Settings::where('key', '=', 'social_linkedin')->first()->value }}" title="{{Settings::where('key', '=', 'social_linkedin')->first()->value }}">{{Settings::where('key', '=', 'social_linkedin')->first()->value }}</a><br />
                    </address>
                </div>
                <div class="medium-8 columns">
                    @yield('contact-form')
                </div>
            @else
                <div class="medium-12 columns">
                  <p>@yield('content')</p>
                </div>
            @endif
        </div>
      @include('front.includes.footer')
    </body>
</html>