<!DOCTYPE html>
{{-- <!Doctype html> --}}
<html lang="en">
  <head>
        <!-- Header Codes -->
        @include('frontend.includes.header')
  </head>
  <body>

      <div class="preloader loader" style="display: block; background:#f2f2f2;"> <img src="image/loader.gif"  alt="#"/></div>

      <!-- navbar -->
      @include('frontend.includes.navbar')


      <!-- All Page Body Content -->
      @yield('bodycontent')


      <!-- Footer -->
      @include('frontend.includes.footer')

      <!-- Scripts -->
      @include('frontend.includes.scripts')

    </body>
</html>
