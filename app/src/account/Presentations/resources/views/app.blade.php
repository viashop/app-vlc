<!doctype html>
<html lang="pt-br">
    @include('account::partials.head')
    <body>
        @include('account::partials.navbar')
        @yield('main-content')
        
        @include('account::partials.scriptshtml')
    	@include('account::partials.pwstrength')
    </body>    
</html>
