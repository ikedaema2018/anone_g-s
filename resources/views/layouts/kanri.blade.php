<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>管理画面</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div>
        <!-- ヘッダー 始まり -->
        <header class="header-container">
            <div class="header-container">
                <img src="img/m.png" alt="" width="40" height="40">
                <div class="header-wrap">
                    <p class="header-p">こっそりなら言えるにがてがある!</p>
                    <h1 class="header-h1">Anone</h1>
                </div>
                <img src="img/m.png" alt="" width="40" height="40">
            </div>
            <div>
                <a href="{{ url('nigate') }}">
                    <p class="header-register">苦手一覧</p>
                </a>
                <a href="{{ url('thread') }}">
                    <p class="header-login">スレッド一覧</p>
                </a>
                <a href="{{ url('user_list') }}">
                    <p class="header-login">ユーザー一覧</p>
                </a>
                <a href="{{ url('category') }}">
                    <p class="header-login">カテゴリー一覧</p>
                </a>
            </div>
        </header>
        <!-- ヘッダー 終わり-->
        
        @yield('content')
        
         <!-- フッター始まり -->
        <footer>
            <div>
                <p>＊＊＊＊＊＊＊＊
                    <br>＊＊＊＊＊＊＊＊</p>
            </div>
        </footer>
        <!-- フッター終わり -->
    </div>
</body>

</html>