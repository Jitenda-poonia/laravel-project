<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    {{-- <title>SafeCam -CCTV</title> --}}
    @yield('title')
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

   @include('includes.web-head')
   @yield('style')

</head>

<body>
    <!-- Navbar Start -->
   @include('includes.web-nav')
    
    <!-- Navbar End -->

 @yield('content')
    

    <!-- Footer Start -->
    @include('includes.web-footer')

</body>

</html>