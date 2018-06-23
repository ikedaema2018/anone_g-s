@extends('layouts.kanri')

@section('content')
    <form action="{{ url('user_list_update') }}" method="post">
        {{ csrf_field() }}
         <p>名前</p><input type="text" name="name" value="{{$user->name}}"/>
        <!--<p>パスワード</p><input type="text" name="password"/>-->
        <p>性別</p>
        
        <p>
        <input type="radio" name="sex" value="男"/>男
        <input type="radio" name="sex" value="女"/>女
        </p>
        
        <select name="school_year">学年
        <option value="小学1年生">小学1年生</option>
        <option value="小学2年生">小学2年生</option>
        <option value="小学3年生">小学3年生</option>
        <option value="小学4年生">小学4年生</option>
        <option value="小学5年生">小学5年生</option>
        <option value="小学6年生">小学6年生</option>
        <option value="中学1年生">中学1年生</option>
        <option value="中学2年生">中学2年生</option>
        <option value="中学3年生">中学3年生</option>
        <option value="高校1年生">高校1年生</option>
        <option value="高校2年生">高校2年生</option>
        <option value="高校3年生">高校3年生</option>
        </select>
        
        <p>苦手なものをいくつか選択してね！</p>
        <p>
        <input type="checkbox" name="nigate[]" value="1">水泳
        <input type="checkbox" name="nigate[]" value="2">算数
        <input type="checkbox" name="nigate[]" value="3">漢字
        </p>
        <p>
        <input type="checkbox" name="nigate[]" value="4">友達作り
        <input type="checkbox" name="nigate[]" value="5">会話
        <input type="checkbox" name="nigate[]" value="6">図工
        </p>
        <button type="submit">変更する</button>
    </form>
@endsection