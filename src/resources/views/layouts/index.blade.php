<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiGLy</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
    @yield('css')
</head>

<body class="body">
    <div class="contents">
        <header class="header">
        <h2 class="header__logo">PiGLy</h2>
        <div class="header__nav">
            <a class="weight-setting-button" href="/wight_logs/goal_setting">目標体重設定</a>
            <form action="/logout" method="post">
            @csrf
            <button class="logout-btn" type="submit" value="">ログアウト</button>
            </form>
        </div>
        </header>
        <main>
            @yield('content')
        </main>
    </div>
</body>

</html>
