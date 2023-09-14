@extends('layout')
 
@section('content')
    <h2 class="mytitle mb-0">タグ一覧</h2>

    <div class="d-flex flex-row-reverse">
        <div class="rounded-bottom bg_coral border-around-coral mb-2 me-3 d-inline-flex">
            <a href="{{ route('tags.create') }}" class="btn btn-primary float-right m-2">新規作成</a>
        </div>
    </div>

    <div class="container rounded bg-white py-3 px-5 shadow mt-3">
        <hr class="myhr">
        @foreach($tag_list as $tag)
            <div class="row my-2">
                <div class="col-8"><h4># {{ $tag->name }}</h4></div>      

                <div class="col-4 text-end">
                    <a href="{{ route('tags.edit', [$tag->id])}}" class="btn btn-primary">
                        編集
                    </a>
                    <button type="button" class="btn btn-danger ms-1" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        削除
                    </button>
                </div>
            </div>

            <hr class="myhr">
        @endforeach
    </div> 

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-end">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button><br>
                    </div>
                    <div>
                        <span class="fw-bolder">
                            本当にタグを削除しますか？<br>
                        </span>
                        ※ この操作は取り消せません
                    </div>
                    <div class="text-end">
                        {!! delete_form(['tags', $tag->id]) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection