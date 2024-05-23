<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FasionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <div class="header-utilities">
                <h1 class="header__logo">
                    FashionablyLate
                </h1>
                <nav>
                    <ul class="header-nav">
                        <li>
                            <!-- ログイン済みかをチェックしてログイン済みの場合にnavを表示させる -->
                            @if (Auth::check())
                            <form action="/logout" method="post">
                                @csrf
                                <button class="header-nav__button">logout</button>
                            </form>
                            @endif
                        </li>
                        <li>
                            @yield('auth_button')
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main class="main">
        <div class="main_inner">
            @yield('content')
        </div>
    </main>
</body>

</html>