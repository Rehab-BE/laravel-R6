<!doctype html>
<html lang="en">
    @include('includes.head')
    
    <body>
    
  <main>
  @include('includes.navbar')
  @include('includes.preloader')

     @yield('content')
  </main>
    @include('includes.footer')
    @include('includes.footer_js')
  
    </body>
</html>