<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- csrf token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Vue laravel SPA') }}</title>

    <!-- style -->
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>

<body>
    <div id="app">
        <header-component></header-component>

        <router-view></router-view>
    </div>

    <!-- script -->
    <script src="{{ mix('/js/app.js') }}" defer></script>

</body>

</html>