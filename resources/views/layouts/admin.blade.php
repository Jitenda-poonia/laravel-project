<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {{-- <title>admin</title> --}}
    @stack('title')

    @include('includes.head')
    @yield('style')
</head>

<body>
    <div id="wrapper">
        @include('includes.header')
        <!-- /. NAV TOP  -->
        @include('includes.nav')
        
        <!-- /. NAV SIDE  -->
       
        <div id="page-wrapper">
            <div>@yield('message')</div>
            
            <div id="page-inner">

                @yield('content')

                <!--/.ROW-->

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

    @include('includes.footer')



</body>

</html>
