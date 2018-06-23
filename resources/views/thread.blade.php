@extends('layouts.kanri')

@section('content')
<!-- スレッド登録 始まり -->
    <div>
        <p>管理者画面</p>
        <div>
            <h2>スレッド登録画面</h2>
            <form action="{{url('thread')}}" method="post">
                {{csrf_field()}}
                <ul>
                    <li>スレッドを登録 </li>
                    <input type="text" name="thread_name">
                    
                    <li>カテゴリを選択</li>
                    @if(count($categories)>0)
                    @foreach($categories as $category)
                    <input type="radio" name="category_id" value="{{$category->id}}"> {{$category->category_name}}
                    @endforeach
                    @endif
                    
                    <li>ニガテを選択</li>
                    @if(count($nigates)>0)
                    @foreach($nigates as $nigate)
                    <input type="radio" name="nigate_id" value="{{$nigate->id}}"> {{$nigate->nigate_name}}
                    @endforeach
                    @endif
                    
                </ul>
                <input type='submit' value='送信'>
            </form>
        </div>
    </div>
    <!-- スレッド登録 終わり -->
    
    <!--スレッド一覧-->
    @if(count($threads)>0)
    <table>
            <thead>
                <th>スレッドID</th>
                <th>スレッド名</th>
                <th>カテゴリーID</th>
                <th>ニガテID</th>
            <th></th>
            </thead>
            
            <tbody>
                @foreach ($threads as $thread)
                <tr>
                    <td>{{ $thread->id }}</td>
                    <td>{{ $thread->thread_name }}</td>
                    <td>{{ $thread->category_id }}</td>
                    <td>{{ $thread->nigate_id }}</td>
                
                    <td>
                        <form action="{{url('thread/'.$thread->id)}}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit">削除</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{url('thread/'.$thread->id)}}" method="post">
                            {{ csrf_field() }}
                            <button type="submit">更新</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    <!--スレッド一覧-->
@endsection