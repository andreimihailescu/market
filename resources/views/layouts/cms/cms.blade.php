<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts/CMS/components/head')
<body>
<div id="app">

    <div class="row">
        <div class="col-2">
            @include('layouts/CMS/components/nav')
        </div>
        <main class="col-10">
            @yield('content')
        </main>
    </div>
</div>
</body>
</html>
