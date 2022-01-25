<!DOCTYPE html>
<html lang="en">
@include('partials.head')
<body>
    @include('partials.loader')
    <div id="page" class="page">
        @include('partials.header')
        @yield('body')
        @include('partials.footer')
    </div>
    @include('partials.scripts')

</body>

</html>
