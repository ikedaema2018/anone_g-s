@extends('layouts.app')

@section('content')

    <!-- スレッドタイトル表示 -->
    <div class="thread_title">
        <h2 class="">{{$thread->thread_name}}</h2>
    </div>
    <!-- スレッドタイトル表示 終わり-->


    <!-- スレッドコメント表示 -->
    <div class="thread_comment">
        <table>
            <tr><th>名前</th><th>コメント</th></tr>
            @if(count($comments)>0)
            @foreach($comments as $comment)
            <tr>
                <td>{{$comment->name}}</td>
                <td>{{$comment->comment_name}}</td>
            </tr>
            @endforeach
            @endif
        </table>
    </div>
    
    <h2>コメントする</h2>
    <form action="{{url('user_thread')}}" method="post">
        {{csrf_field()}}
        <input type="hidden" name="thread_id" value="{{$thread->id}}"/>
        @isset($user)
        <input type="hidden" name="user_id" value="{{$user->id}}"/>
        <input type="hidden" name="name" value="{{$user->name}}"/>
        @endisset
        <input type="text" name="comment_name"/>
        <button type="submit">送信</button>
    </form>
    <!-- スレッドコメント表示 終わり-->
    <!-- おすすめのニガテ -->
    <div class="recomend_thread">
        <h2>おすすめのニガテ</h2>
        <a href="">
            <h3>おすすめスレッド名</h3>
        </a>

        <ul>
            <li class="comment">
            </li>
            <li class="comment">
            </li>
            <li class="comment">
            </li>
            <li class="comment">
            </li>
        </ul>
    </div>
    <!-- おすすめのニガテ 終わり-->

@endsection