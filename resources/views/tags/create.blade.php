@extends('layout')
 
@section('content')
    <h2 class="mytitle">新規タグ作成</h2>
 
    
    <div class="rounded bg-white p-3 shadow mt-3">
        @include('errors.form_errors')

        {{-- Form::open(['url' => 'tags']) --}}
        {!! Form::open(['route' => 'tags.store']) !!}
            @include('tags.form', ['published_at' => date('Y-m-d'), 'submitButton' => 'タグ追加'])
        {!! Form::close() !!}
    </div>
    
@endsection