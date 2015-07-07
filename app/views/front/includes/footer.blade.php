<footer role="footer" class="lightgray">
    <div class="row">
        <div class="columns small-12 medium-6">
            <div class="footer-block">
                <h3>{{Settings::where('key', '=', 'hours_title')->first()->value }}</h3>
                <p>{{Settings::where('key', '=', 'hours_weekly')->first()->value }}</p>
                <p>{{Settings::where('key', '=', 'hours_weekend')->first()->value }}</p>
            </div>
        </div>
        <div class="columns small-12 medium-6">
            <div class="logo"></div>
        </div>
    </div>
    <p class="copyright text-center">Copyright &copy 2014-2015 {{ Config::get('statics.customer') }}</p>
</footer>
<script type="text/javascript" src="{{ URL::asset('assets/build/libs/foundation/js/foundation.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/build/js/main.min.js') }}"></script>
{{--<script>--}}
  {{--(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){--}}
  {{--(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),--}}
  {{--m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)--}}
  {{--})(window,document,'script','//www.google-analytics.com/analytics.js','ga');--}}

  {{--ga('create', 'UA-58344815-2', 'auto');--}}
  {{--ga('send', 'pageview');--}}

{{--</script>--}}