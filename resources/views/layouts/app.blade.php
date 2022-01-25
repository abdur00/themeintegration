<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
    @include('layouts.nav')
    @include('layouts.sidenav')
    <main class="content">
        {{-- TopBar --}}
        @include('layouts.topbar')
        @yield('content')
        {{-- Footer --}}
        @include('layouts.footer')
    </main>

    @yield('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script>

            $('.edit').click(function(){
                var cat_id=$(this).attr('data-id');
                alert(cat_id);
                $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                  });
                  $.ajax({
                    url:"{{ route('category.edit') }}",
                    method:"get",
                      data:{id:cat_id}
                  })
                  .done(function(request){
                   //   alert(request.category.name);
                      $('#exampleModal').modal('show');
                      $('#name12').val(request.category.name);
                       $('#desc').val(request.category.description);

                  });
            });



    </script>
    <script>
        $('.create').click(function(e){
            e.preventDefault();
            alert(cat_id);
            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });
              $.ajax({
                url:"{{ route('category.create') }}",
                method:"POST",
                  data:{}
              })
              .done(function(request){
                  alert(request.category.name);
                  $('#exampleModal').modal('show');
                  $('#name12').val('');
                   $('#desc').val('');

              });
        });
    </script>

</body>

</html>
