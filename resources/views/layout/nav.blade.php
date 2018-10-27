<nav id="nav" class="navbar fixed-top navbar-expand-lg navbar-black fixed-top bg-black">
    <div class="container">
        <a class="navbar-brand" href="/"><b>{{config('app.name')}}</b></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            <i class="navbar-toggler-icon fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home')}}">@lang('homepage')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('article.index')}}">@lang('document')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('feedback')}}">@lang('feedback')</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('register') }}</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.profile.edit',Auth::id()) }}">@lang('user.home')</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a style="text-transform:none;" id="navbarDropdown" class="nav-link dropdown-toggle"
                           href="#"
                           role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ auth()->user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            {{--<a class="dropdown-item" href="{{ route('user.profile.edit',Auth::id()) }}">--}}
                                {{--@lang('user.home')--}}
                            {{--</a>--}}

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                @lang('logout')
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
