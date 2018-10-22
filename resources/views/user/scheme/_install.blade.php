<!--{{__('scheme.install_div_to_your_position')}}-->
<div id="{{$container}}"></div>

<!--{{__('scheme.install_script_to_your_position')}}-->
<script type="text/javascript">
  (function (i, s, o, g, r, a, m) {
    i['leagueObject'] = r;
    i[r] = i[r] || function () {
      (i[r].q = i[r].q || []).push(arguments);
    };
    i[r].l = 1 * new Date();
    a = s.createElement(o);
    m = s.getElementsByTagName(o)[0];
    a.async = true;
    a.src = g;
    m.parentNode.insertBefore(a, m);
  })(window, document, 'script', '//{{config('app.cdn')}}/js/league.js', 'league');
  league('create', '{{$key}}');
</script>

