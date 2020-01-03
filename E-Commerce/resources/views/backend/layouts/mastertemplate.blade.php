<!Doctype html>
<html lang="en">
  <head>
        <!-- Header Codes -->
        @include('backend.includes.header')
  </head>
  <body>

      {{-- <div class="preloader loader" style="display: block; background:#f2f2f2;"> <img src="image/loader.gif"  alt="#"/></div> --}}

      <!--left-sidebar -->
      @include('backend.includes.navbar_left')


      <!-- All Page Body Content -->
      @yield('backendPageContent')


      <!-- Footer -->
      @include('backend.includes.footer')

    </body>
</html>