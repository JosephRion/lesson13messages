@extends('layouts.app')

@section('content')

<!-- ここからページ毎のコンテンツを書く -->

//Controllerから渡されたデータ ($messages) を一覧表示させましょう。<br>
//php 形式コメントアウト<br>
<!--HTML形式コメントアウト-->
{{--Blade用のコメントアウトの形式--}}

{{-- '<p style="color: red;">htmlspecialchars関数に通した場合--あり</p>' --}}
<br>
{{ '<p style="color: red;">htmlspecialchars関数に通した場合</p>' }}
<br>
{!! '<p style="color: red;">htmlspecialchars関数に通さなかった場合</p>' !!}
<br>
htmlspecialchars関数に通さなかった場合。単にそのままマークアップせず。
<p style="color: red;">htmlspecialchars関数に通さなかった場合 pタグでマークアップ</p>
<br>

<h1>メッセージ一覧</h1>

    @if (count($messages) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>メッセージ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $message)
                <tr>
                    <td>{{ $message->id }}</td>
                    <td>{{ $message->content }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
<!-- ここまでページ毎のコンテンツを書く -->

@endsection