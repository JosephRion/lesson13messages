@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く 
Lesson 13Chapter 8.6 MessagesControllerあっとshow
-->

    <h1>id = {{ $message->id }} のメッセージ詳細ページ</h1>

    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <td>{{ $message->id }}</td>
        </tr>
        
        <!-- カラム追加によりテーブルに１列追加ここから-->
        <tr>
            <th>タイトル</th>
            <td>{{ $message->title }}</td>
        </tr>
        <!-- カラム追加によりテーブルに１列追加ここまで-->
        
        
        <tr>
            <th>メッセージ</th>
            <td>{{ $message->content }}</td>
        </tr>
    </table>
    
     {{-- メッセージ編集ページへのリンク 
     URLの直入力以外でもeditビューにアクセスできるように詳細ページにリンクを置きましょう。
     Lesson 13Chapter 8.7 MessagesController@edit
     --}}
    {!! link_to_route('messages.edit', 'このメッセージを編集', ['message' => $message->id], ['class' => 'btn btn-light']) !!}
    
     {{-- メッセージ削除フォーム --}}
    {!! Form::model($message, ['route' => ['messages.destroy', $message->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}


@endsection