<!doctype html>
<html>
<head>
   @include('include.head')
</head>
<body>
    @include('include.header')

    @yield('content')
    
    @include('include.footer')
</body>
