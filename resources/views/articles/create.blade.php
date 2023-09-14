@extends('layout')
 
@section('content')
    <h2 class="mytitle">新規記事作成</h2>
 
    
    <div class="rounded bg-white p-3 shadow mt-3">
        @include('errors.form_errors')

        {{-- Form::open(['url' => 'articles']) --}}
        {!! Form::open(['route' => 'articles.store']) !!}
            @include('articles.form', ['published_at' => date('Y-m-d'), 'submitButton' => '記事追加'])
        {!! Form::close() !!}
    </div>
    
@endsection