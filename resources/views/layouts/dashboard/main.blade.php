<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard</title>
    @include('layouts.dashboard.pageStyle')
</head>
<body>
<div class="container-scroller">
    @include('layouts.dashboard.navbar')
    <div class="container-fluid page-body-wrapper">
{{--        @include('layouts.settings-panel')--}}
        @include('layouts.dashboard.sidebar')
        <div class="main-panel">
            <div class="content-wrapper">
                @yield('pageContent')
            </div>
            @include('layouts.dashboard.footer')
        </div>
    </div>
</div>
</body>
@include('layouts.dashboard.pageJs')
</html>


