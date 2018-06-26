@extends('layouts.app')

@section('content')

<p>{{$comment->comment_name}}ができた</p>

<form action="{{url('dekita_act')}}" method="post">
    {{csrf_field()}}
    <input type="hidden" name="id" value="{{$comment->id}}">
    <input type="hidden" name="dekita_flag" value="{{$comment->dekita_flag}}">
    <input type="text" name="dekita_text">
    <button type="submit">送信</button>
</form>

@endsection