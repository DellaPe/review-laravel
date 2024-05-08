<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @vite('resources/css/app.css')
  <title>Laravel</title>

  <!-- Fonts -->
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

</head>

<body class="bg-slate-950 text-red-300 flex items-center justify-center m-5">
  <main>
    @yield('content')
  </main>
</body>

</html>