@extends('layouts.app')

@section('content')

    <h1>タスク新規作成ページ</h1>

    {!! Form::model($task,['route'=>'tasks.store']) !!}

    {!! Form::label('title','タイトル')!!}
    {!! Form::text('title') !!}
    
    {!! Form::label('content','タスク:')!!}
    {!! Form::text('content') !!}
    
    {!! Form::label('statust','ステータス:')!!}
      {!! Form::select('status',[
         'active' =>'active',
         'idol'=>'idol',
         'sleep'=>'sleep',
         ])
  !!}


    {!! Form::submit('投稿') !!}


    {!! Form::close() !!}

@endsection