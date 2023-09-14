@extends('layout')
 
@section('content')
    <h2 class="mytitle">編集</h2>

    <div class="rounded bg-white p-3 shadow mt-3">
        @include('errors.form_errors')

        {!! Form::model($tag, ['method' => 'PATCH', 'url' => ['tags', $tag->id]]) !!}
            @include('tags.form', ['submitButton' => 'タグ更新'])
        {!! Form::close() !!}
    </div>

@endsection