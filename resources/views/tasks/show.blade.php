@extends('layouts.app')

@section('content')

    <h1>id = {{ $task->id }} のタスク詳細ページ</h1>
    <p>分類：{{ $task->title }}</p>
    <p>内容：{{ $task->content }}</p>
     <p>状態：{{ $task->status }}</p>
    {!! link_to_route('tasks.edit', 'このタスクを編集', ['id' =>$task->id]) !!}
    
  {!! Form::model($task,['route'=>['tasks.destroy',$task->id],'method'=>'delete']) !!}
{!! Form::submit('削除') !!}
@endsection