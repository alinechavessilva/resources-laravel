<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Resources - @yield('title')</title>
    {{Html::style('css/bootstrap.css')}}
    {{Html::style('css/bootstrap-theme.min.css')}}
</head>
<body>
<div class="container">
    @yield('content')
</div>

{{Html::script('js/jquery-3.1.1.min.js')}}
{{Html::script('js/bootstrap.js')}}

</body>
</html>