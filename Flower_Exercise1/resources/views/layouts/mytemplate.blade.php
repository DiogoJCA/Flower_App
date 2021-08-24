<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @yield('css')
</head>
<body>
    @include('layouts.nav')
    
    <div class="content">
        
        
        @yield('content')
        
    </div>
   
    <footer>
        <p>This is my footer</p>
    </footer>
    @yield('scripts')
</body>
</html>