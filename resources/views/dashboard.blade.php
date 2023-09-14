@extends('layout')

@section('content')
    
    <h2 class="font-semibold text-xl leading-tight mytitle mb-0">
        {{ Auth::user()->name }}さんのダッシュボード
    </h2>

    @auth
    <div class="d-flex flex-row-reverse">
        <div class="rounded-bottom bg_coral border-around-coral mb-2 me-3 d-inline-flex">
            <a href="{{ route('articles.create') }}" class="btn btn-primary float-right m-2">新規作成</a>
            <a href="{{ url('tags') }}" class="btn btn-secondary float-right my-2 me-2">タグ一覧</a>
        </div>
    </div>
    @endauth

    <div class="container mt-5">
        <div class="row">
            <div class="col border-top-coral bg-white">
                <div class="fs-5 fw-bolder text-center py-2  position-relative">
                    <a href="{{ url('dashboard') }}" class="text-dark text-decoration-none stretched-link">
                        自分の投稿
                    </a>
                </div>
            </div>
            <div class="col">
                <h5 class="text-center px-2 py-1 position-relative">
                    <a href="{{ url('bookmarks') }}" class="text-muted text-decoration-none stretched-link">
                        お気に入り
                    </a>
                </h5>
            </div>
        </div>
    </div>

    <div class="rounded-bottom  bg-white p-3 shadow">
        @include('articles.articles')
    </div>
 
@endsection