<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard</title>
    @include('layouts.pageStyle')
</head>
<body>
<div class="container-scroller">
    @include('layouts.navbar')
    <div class="container-fluid page-body-wrapper">
{{--        @include('layouts.settings-panel')--}}
        @include('layouts.sidebar')
        <div class="main-panel">
            <div class="content-wrapper">
                @yield('pageContent')
            </div>
            @include('layouts.footer')
        </div>
    </div>
</div>
</body>
@include('layouts.pageJs')
</html>


