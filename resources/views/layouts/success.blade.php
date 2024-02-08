<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="title" content="Action Figure Marketplace">
    <meta name="keywords" content="anime, action figure, marvel">
    <meta name="robots" content="noindex">
    <meta name="language" content="Indonesia">

    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="Action Figure Marketplace" />
    <meta name="author" content="Alif Suryadi" />

    <title>@yield('title')</title>

    <link href="/images/favicon/favicon.ico" rel="icon" />
    <link href="/images/favicon/apple-touch-icon.png" rel="apple-touch-icon" />

    {{-- Style --}}
    @stack('prepend-style')
    @include('includes.style')
    @stack('addon-style')

  </head>

  <body>

    <!-- Page Content -->
    @yield('content')

    
    <!-- Footer -->
    @include('includes.footer')


    {{-- Script --}}
    @stack('prepend-script')
    @include('includes.script')
    @stack('addon-script')

  </body>
</html>
