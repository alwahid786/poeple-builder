<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Super Admin</title>


    @include('includes.superadmin.header')
    @yield('customhead')

</head>

<body>
    @yield('content')

    @include('includes.superadmin.footer')
    @yield('admininsertjavascript')
</body>

</html>