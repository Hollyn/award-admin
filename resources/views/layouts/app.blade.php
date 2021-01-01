<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <style>
            body {
              font-family: "Lato", sans-serif;
            }
            
            .sidenav {
              height: 100%;
              width: 160px;
              position: fixed;
              z-index: 1;
              top: 0;
              left: 0;
              background-color: #111;
              overflow-x: hidden;
              padding-top: 20px;
            }
            
            .sidenav a {
              padding: 6px 8px 6px 16px;
              text-decoration: none;
              font-size: 25px;
              color: #818181;
              display: block;
            }
            
            .sidenav a:hover {
              color: #f1f1f1;
            }
            
            .main {
              margin-left: 160px; /* Same as the width of the sidenav */
              
              padding: 0px 10px;
            }
            
            @media screen and (max-height: 450px) {
              .sidenav {padding-top: 15px;}
              .sidenav a {font-size: 18px;}
            }
            </style>
        @stack('style')
    </head>
    <body>

        <div class="sidenav">
            <a href="{{url('')}}">Dashboard</a>
            <a href="{{url('category')}}">Categories</a>
            <a href="{{url('candidate')}}">Candidates</a>
            {{-- <a href="{{route('admin')}}">Admins</a> --}}
            <a href="{{route('logout')}}">Logout</a>
        </div>
        <div class="main">
            @yield('content')
        </div>
    </body>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    @stack('script')
</html>