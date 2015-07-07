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
            <div class="medium-12 columns">
              <h1>@yield('title')</h1>
              <p>@yield('content')</p>
            </div>
          </div>
        </div>
        <div class="footer">
            @include('front.includes.footer')
        </div>
    </body>
</html>