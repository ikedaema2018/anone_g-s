@extends('layouts.kanri')

@section('content')
    <form action="{{ url('nigate_update') }}" method="post">
        {{ csrf_field() }}
        <input type="text" name="nigate_name" value="{{$nigate->nigate_name}}"/>
        <p>カテゴリー一覧</p>
            @foreach($categories as $category)
            <input type="radio" name="category_id" value="{{$category->id}}">{{$category->category_name}}
            @endforeach
        <input type="hidden" name="id" value="{{ $nigate->id }}"/>
        <button type="submit">更新する</button>
    </form>
@endsection