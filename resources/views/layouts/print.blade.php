<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="Action Figure Marketplace" />
    <meta name="author" content="Alif Suryadi" />

    <title>@yield('title')</title>

    {{-- Styles --}}
    @stack('prepend-style')
    @include('includes.style')
    @stack('addon-style')

  </head>

  <body>
    <div class="page-dashboard">

      @yield('content')

    
      @stack('prepend-script')
      @include('includes.script')
      @stack('addon-script')

    </div>
  </body>
</html>
