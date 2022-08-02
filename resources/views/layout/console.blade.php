<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Console Dashboard</title>

        <!--CSS Framework/CSS-->
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="{{url('app.css')}}">

        <!--JS source-->
        <script src="{{url('app.js')}}"></script>


    </head>
    <body>

        <!--generating url-->
        <?php 
           // echo url("app.js")
        ?>
        <h1>CMS Admin Dashboard</h1>

        <!--check if user have authentication to be in dashboard-->
        @if (Auth::check())
                You are logged in as {{auth()->user()->first}} {{auth()->user()->last}} |
                <a href="/console/logout">Log Out</a> | 
                <a href="/console/dashboard">Dashboard</a> | 
                <a href="/">Website Home Page</a>
            @else
                <a href="/">Return to My Portfolio</a>
            @endif

        <!--Connects the 'content' to console.blade.php-->
        @yield('content')


    </body>
</html>