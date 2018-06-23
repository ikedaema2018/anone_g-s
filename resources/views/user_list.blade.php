@extends('layouts.kanri')

@section('content')

<div>
    @if(count($users)>0)
    <caption>ユーザー一覧</caption>
    <table>
        <thead>
            <th>ユーザーid</th>
            <th>なまえ</th>
            <th>パスワード</th>
            <th>性別</th>
            <th>学年</th>
            <!--<th>苦手なこと</th>-->
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->password}}</td>
                <td>{{$user->sex}}</td>
                <td>{{$user->school_year}}</td>
                
                <td>
                    <form action="{{url('user_list_delete/'.$user->id)}}" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button type="submit">削除</button>
                    </form>
                </td>
                
                <!--<td>ニガテなこと</td>-->
                <!--<td>-->
                <!--    <form action="{{url('user_list/'.$user->id)}}" method="post">-->
                <!--        {{csrf_field()}}-->
                <!--        変更-->
                <!--    </form>-->
                <!--</td>-->
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>

@endsection