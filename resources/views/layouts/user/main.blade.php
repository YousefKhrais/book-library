<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="CodePixar">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta charset="UTF-8">
    <title>Karma Shop</title>
    @include('layouts.user.pageStyle')
</head>
<body>
@include('layouts.user.header')

@yield('pageContent')

@include('layouts.user.footer')
</body>
@include('layouts.user.pageJs')
</html>


