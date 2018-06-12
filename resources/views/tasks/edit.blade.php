@extends('layouts.app')

@section('content')
<h1>id: {{ $task->id }} のタスク編集ページ</h1>

 {!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'put']) !!}

        {!! Form::label('title','タイトル')!!}
        {!! Form::text('title') !!}
        
        {!! Form::label('content', 'メッセージ:') !!}
        {!! Form::text('content') !!}
        
         {!! Form::label('statust','ステータス:')!!}
         {!! Form::select('status',[
         'active' =>'active',
         'idol'=>'idol',
         'sleep'=>'sleep',
         ])
  !!}

        {!! Form::submit('更新') !!}

{!! Form::close() !!}

@endsection