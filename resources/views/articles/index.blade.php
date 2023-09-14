@extends('layout')
 
@section('content')
    <h2 class="mytitle mb-0">投稿一覧</h2>

    <div class="d-flex flex-row-reverse">
        <div class="rounded-bottom bg_coral border-around-coral mb-2 me-3 d-inline-flex">
            <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#searchModal">
                検索
            </button>
        </div>
    </div>

    

    <div class="rounded bg-white p-3 shadow">
        @include('articles.articles')
    </div>


    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-end">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button><br>
                    </div>
                    
                    <h4>投稿検索</h4>
                    {{-- Form::open(['url' => 'articles']) --}}
                    {!! Form::open(['route' => 'articles.index', 'method' => 'get']) !!}
                        
                        <div class="form-group mb-3">
                            <label class="col-md-4 control-label">タイトル</label>
                            {!! Form::text('title', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group mb-3">
                            <label class="col-md-4 control-label">タグ</label>
                            {!! Form::text('tag', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group mb-3">
                            <label class="col-md-4 control-label">投稿者</label>
                            {!! Form::text('user', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group mb-3">
                            {!! Form::submit('検索', ['class' => 'btn btn-primary form-control']) !!}
                        </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

    
@endsection