
@include('layouts.header')
@include('layouts.sidemenu')
  @include('layouts.topnav')        
  <div class="main-content">
            <div class="section__content section__content--p30">
                    @yield('content')
            </div>
        </div>
  @include('layouts.footer')  