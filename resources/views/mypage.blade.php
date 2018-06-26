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
                    <span>{{$myNigate->nigate_lists->nigate_name}}&nbsp;</span>
                    @endforeach
                    @endif
                </li>
            </ul>
            <button type="button" name="aaa" value="修正する">未実装</button>
        </div>
        <!-- ユーザーprofileー おわり-->

        <!-- ユーザーニガテ宣言ー はじまり-->

        <div class="nigate_sengen">
            <h2>{{$user->name}}ちゃんが宣言したニガテ
            </h2>
            <table>
                <tr>
                    <th>ニガテ</th>
                    <th>できた！</th>
                </tr>
                @if (count($comments)>0)
                @foreach($comments as $comment)
                
                <tr>
                    <td>{{$comment->comment_name}}</td>
                    <td><form action="{{url('dekita/'.$comment->id)}}" method="post">
                        {{csrf_field()}}
                      <button type="submit">できた！</button>
                    </form></td>
                </tr>
                
                @endforeach
                @endif
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