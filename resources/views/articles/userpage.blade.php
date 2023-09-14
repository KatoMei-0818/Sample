@extends('layout')

@section('content')
    
    <h2 class="font-semibold text-xl leading-tight mytitle">
        {{ $user->name }}さんの投稿
    </h2>

    <div class="my-3 py-3 px-4 rounded bg-light shadow">
        <h5>
            自己紹介
        </h5>
        {{$user->profile}}
    </div>

    <div class="rounded bg-white p-3 shadow">
        @include('articles.articles')
    </div>
 
@endsection