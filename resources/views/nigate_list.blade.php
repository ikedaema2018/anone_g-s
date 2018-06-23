@extends('layouts.kanri')

@section('content')
<div>
    <h2>ニガテとうろく画面</h2>
    <div>
        <div>
            
        </div>
        <form action="{{url('nigate')}}" method="post">
            {{csrf_field()}}
            <input type="text" name="nigate_name"/>
            <p>カテゴリー一覧</p>
            @foreach($categories as $category)
            <input type="radio" name="category_id" value="{{$category->id}}">{{$category->category_name}}
            @endforeach
            <button type="submit">登録</button>
        </form>
    </div>
    <div>
        @if (count($nigates) > 0)
        <table>
            <thead>
                <th>nigateID</th>
                <th>ニガテ</th>
                <th>category_id</th>
            </thead>
            
            <tbody>
                @foreach ($nigates as $nigate)
                <tr>
                    <td>{{ $nigate->id }}</td>
                    <td>{{ $nigate->nigate_name }}</td>
                    <td>{{ $nigate->category_id }}</td>
                
                    
                    <td>
                        <form action="{{url('nigate/'.$nigate->id)}}" method="post">
                            {{ csrf_field() }}
                            <button type="submit">更新</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>


@endsection