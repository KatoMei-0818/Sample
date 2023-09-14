@extends('layout')
 
@section('content')

    <div class="rounded bg-white p-5 shadow">
        <div><h2>{{ $article->title }}</h2></div>
        <div class="text-muted">投稿者：{{$article->user->name}}</div>

        <hr/>

        <article>
            <div class="body fs-5">
                <?php
                    $text = str_replace(PHP_EOL, '<br/>', $article->body );
                    echo $text;
                ?>
            </div>
        </article>

        <div class="mt-3">
            @unless ($article->tags->isEmpty())
                <div class=" text-primary">
                    @foreach($article->tags as $tag)
                        # {{ $tag->name }}
                    @endforeach
                </div>
            @endunless
            
            <div class="text-muted mb-2">
                {{ \Carbon\Carbon::createFromTimeString($article->published_at)->format('Y/m/d') }} 公開
            </div>
            
            <div class="d-flex flex-row">
                
                <?php
                    $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'null';

                    if (preg_match("/dashboard/", $referer)) {
                ?>
                        @auth
                            <a href="{{ route('articles.edit', [$article->id])}}"
                            class="btn btn-primary"
                            >
                                編集
                            </a>

                            <button type="button" class="btn btn-danger mx-1" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                削除
                            </button>
                        @endauth
                <?php
                    }
                    else {
                ?>
                        @auth
                            @if (!Auth::user()->is_bookmark($article->id))
                                <form action="{{ route('bookmark.store', $article) }}" method="post">
                                    @csrf
                                    <button class="btn btn-danger float-right me-1">お気に入り登録</button>
                                </form>
                            @else
                                <form action="{{ route('bookmark.destroy', $article) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-secondary float-right me-1">お気に入り解除</button>
                                </form>
                            @endif

                            <div class="btn bg-info me-1">
                                <a href="{{ url('userpage', $article->user->id) }}" class="text-white text-decoration-none">
                                    {{ $article->user->name }}さんの他の投稿を見る
                                </a>
                            </div>
                            
                        @endauth
                        
                <?php
                    }
                ?>
                <a href="{{ url($referer) }}" class="btn btn-secondary float-right">
                    一覧へ戻る
                </a>
            </div>
        </div>

        <br/>


        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-end">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button><br>
                        </div>
                        <div>
                            <span class="fw-bolder">
                                本当に投稿を削除しますか？<br>
                            </span>
                            ※ この操作は取り消せません
                        </div>
                        <div class="text-end">
                            {!! delete_form(['articles', $article->id]) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection