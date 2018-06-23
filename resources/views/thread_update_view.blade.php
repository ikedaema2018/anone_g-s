@extends('layouts.kanri')

@section('content')
    <form action="{{ url('thread_update') }}" method="post">
        {{ csrf_field() }}
        <input type="text" name="thread_name" value="{{$thread->thread_name}}"/>
        <p>カテゴリー一覧</p>
            @foreach($categories as $category)
            {{$category->id}}.
            <input type="radio" name="category_id" value="{{$category->id}}">{{$category->category_name}}
            @endforeach
        <p>ニガテ一覧</p>
            @foreach($nigates as $nigate)
            {{$nigate->id}}.
            <input type="radio" name="nigate_id" value="{{$nigate->id}}">{{$nigate->nigate_name}}
            @endforeach
        <input type="hidden" name="id" value="{{ $thread->id }}"/>
        <button type="submit">更新する</button>
    </form>
@endsection