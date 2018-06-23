@extends('layouts.app')

@section('content')

<!-- ログイン画面始まり -->
        <div class="login-wrapper">
            <h2 class="login-title">ログイン画面</h2>
            <div class="login-container">
                <form action="{{ url('login_act') }}" method="post">
                    {{csrf_field()}}
                    <div class="login-user-wrap">
                        <input name="name" class="login-user" type="text" placeholder="ユーザー名を入力">
                    </div>
                    <br>
                    <div class="login-pas-wrap">
                        <input name="password" class="login-pas" type="text" placeholder="パスワードを入力">
                    </div>
                    <div>
                        <button class="login-btn">ログインする</button>
                    </div>
                <form>
                <!--アンダーバー作るためのdiv-->
                <div class="login-register">
                    <p class="login-p">アカウントを持っていないお友達</p>
                    <button class="login-register-btn">とうろくする</button>
                </div>
                <!--アンダーバー作るためのdiv-->
                <div class="login-logout">
                    <button class="login-logout-register">ログアウト</button>
                </div>
            </div>
        </div>
        <!-- ログイン画面終わり -->

@endsection