<!DOCTYPE html>
<html lang="ja">
    <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>PiGLy</title>
      <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
      <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
      @yield('css')
    </head>

    <body class="body">
        <div class="contents">
        <header class="header">
            <h2 class="header__logo">PiGLy</h2>
            @yield('title')
        </header>

        <main>
            @yield('content')
        </main>
        </div>
    </body>
</html>
