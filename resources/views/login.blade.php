<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('/login_act')}}" method="post">
        {{csrf_field()}}
        <p>名前
        <input type="text" name="name"/>
        </p>
        <p>パスワード
        <input type="text" name="password"/>
        </p>
        <button type="submit">ログイン</button>
    </form>
</body>
</html>