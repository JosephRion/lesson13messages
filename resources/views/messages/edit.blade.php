@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く 
Lesson 13Chapter 8.7 MessagesController@edit
-->

    {{--<!-- エラーメッセージの表示ここから
    @if (count($errors) > 0)
        <ul class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                <li class="ml-4">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    エラーメッセージの表示ここまで-->
    resources/views/layouts/app.blade.phpの記述により削除 2022.06.29--}}

    <h1>id: {{ $message->id }} のメッセージ編集ページ</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($message, ['route' => ['messages.update', $message->id], 'method' => 'put']) !!}

                <!-- L13C10.2カラム追加によりフォーム追加ここから -->
                <div class="form-group">
                    {!! Form::label('title', 'タイトル:') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>
                <!-- L13C10.2カラム追加によりフォーム追加ここまで -->
                
                <div class="form-group">
                    {!! Form::label('content', 'メッセージ:') !!}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>


@endsection