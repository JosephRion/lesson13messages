@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->

{{--{{, }} で囲った場合は、htmlspecialchars関数に通したものが出力されます。
{!!, !!} で囲った場合は、そのまま出力されます。
Lesson 13Chapter 8.4 MessagesController あっとcreate, Vuew
--}}



 <h1>メッセージ新規作成ページ</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($message, ['route' => 'messages.store']) !!}

                <div class="form-group">
                    {!! Form::label('content', 'メッセージ:') !!}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection