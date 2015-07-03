<!doctype html>
<html lang="nl">
    <head>
        @include('front.includes.head')
    </head>
    <body class="{{$page->title}}">
        <div class="hero">
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
                          <li><a href="{{ URL::route('front.portfolio') }}" class="button">Portfolio</a></li>
                          <li><a href="{{ URL::route('front.blog') }}" class="button">Blog</a></li>
                          <li><a href="{{ URL::route('front.contact') }}" class="button">Contact</a></li>
                      </ul>
                  </div>
              </div>
          </div>
          <div class="row">
            <div class="large-12 columns intro-text">
              <p>Front-end Developer / AngularJS Developer<br /><small>Webpower</small></p>
            </div>
          </div>
          <video width="100%" height="100%" autoplay loop>
            <source src="{{ URL::asset('assets/build/mov/dexperts-short-large.mp4') }}" type="video/mp4" />
            Your browser does not support the video tag.
          </video>
      </div>

      <div class="row about">
        <div class="medium-6 large-8 columns">
          <h4>@yield('title')</h4>
          <p>@yield('content')</p>
        </div>
        <div class="medium-6 large-4 columns">
          <img src="{{ URL::asset('assets/build/img/stefvandenberg.jpg') }}" />
        </div>
      </div>

      <div class="row" style="margin-bottom: 0;">
        <div class="large-12 columns">
          <h4>Laatste projecten</h4>
        </div>
      </div>
      <div class="orbit-container work" style="padding-top: 0;">
        <div class="large-12 columns">
          @yield('portfolio')
        </div>
      </div>
      @include('front.includes.footer')
    </body>
</html>