@extends('layouts.app')

@section('content')

        <!-- ユーザーprofileー はじまり-->
        <div class="profile">
            <h2>{{$user->name}}ちゃんのプロフィールページ</h2>
            <ul>
                <li>
                    <p class="">{{$user->name}}</p>
                </li>
                <li>
                    <p class="">{{$user->school_year}}</p>
                </li>
                <li>
                    <p class="">ニガテなこと</p>
                    @if(count($myNigates)>0)
                    @foreach($myNigates as $myNigate)
                    <span>{{$myNigate->nigate_name}}.&nbsp;</span>
                    @endforeach
                    @endif
                </li>
            </ul>
            <button type="button" name="aaa" value="修正する">未実装</button>
        </div>
        <!-- ユーザーprofileー おわり-->

        <!-- ユーザーニガテ宣言ー はじまり-->

        <div class="nigate_sengen">
            <h2>＊＊＊ちゃんが宣言したニガテ
            </h2>
            <table>
                <tr>
                    <th>カテゴリ</th>
                    <td>
                        <a href="">ニガテ宣言内容</a>
                    </td>
                </tr>
            </table>
        </div>
        <!-- ユーザーニガテ宣言ー 終わり-->
        <!-- おすすめスレッドー 始まり-->

        <div class="reccomend">
            <h2>***ちゃんにおすすめのスレッド</h2>
            <ul>
                <h3>
                    <a href="">＊＊＊＊＊のニガテ（スレッド）</a>
                </h3>
                <li>
                    <p>*************</p>
                </li>
        </div>




        <!-- おすすめスレッドー 終わり-->

@endsection