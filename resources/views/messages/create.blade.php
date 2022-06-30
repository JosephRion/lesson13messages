@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->

{{--{{, }} で囲った場合は、htmlspecialchars関数に通したものが出力されます。
{!!, !!} で囲った場合は、そのまま出力されます。
Lesson 13Chapter 8.4 MessagesController あっとcreate, Vuew
--}}
    {{--バリデーションエラーが発生した場合、自動的に元のページへリダイレクトされ、さらに $errors 変数にエラーメッセージが格納されます。そのため、 View側で $errors があるか確認し、あれば表示するという処理を追加すればOKです。また、 $errors と複数形で書いてある通り、複数のエラーが保存されることもあります。
    @if (count($errors) > 0)
        <ul class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                <li class="ml-4">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    resources/views/layouts/app.blade.phpの記述により削除 2022.06.29--}}

 <h1>メッセージ新規作成ページ</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($message, ['route' => 'messages.store']) !!}
                
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

                {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection