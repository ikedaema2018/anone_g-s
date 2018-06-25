<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ログイン</title>
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
                <a href="{{ url('register') }}">
                    <p class="header-register">とうろくする</p>
                </a>
                <a href="{{ url('login') }}">
                    <p class="header-login">ログインする</p>
                </a>
                
                <a href="{{ url('mypage') }}">
                    <p class="header-login">マイページ</p>
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