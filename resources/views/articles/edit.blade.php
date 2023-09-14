@extends('layout')
 
@section('content')
    <h2 class="mytitle">編集: {{ $article->title }}</h2>
 
    
    
    <div class="rounded bg-white p-3 shadow mt-3">
        @include('errors.form_errors')
    
        {!! Form::model($article, ['method' => 'PATCH', 'url' => ['articles', $article->id]]) !!}
            @include('articles.form', ['published_at' => \Carbon\Carbon::createFromTimeString($article->published_at)->format('Y-m-d'), 'submitButton' => '記事更新'])
        {!! Form::close() !!}
    </div>
 
@endsection