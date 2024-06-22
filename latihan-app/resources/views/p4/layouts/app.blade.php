<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@include('p4/layouts.header')
<div style="margin-top: 20px; margin-bottom: 20px">
    @yield('content')
</div>
@include('p4/layouts.footer')
</body>
</html>
