<div class="container">
    <div class="row row-cols-1 row-cols-md-2">
        @foreach($posts as $article)
                <div class="col my-2">
                    <div class="card h-100">
                        <div class="card-body text-wrap">
                            <article>
                                
                                <h5 class="card-title mb-2">
                                    <a href="{{ url('articles', $article->id) }}" class="text-dark text-decoration-none stretched-link">
                                        {{ $article->title }}
                                    </a>
                                </h5>

                                <h6 class="card-subtitle mb-3 text-muted">
                                    投稿者：{{ $article->user->name }}
                                </h6>

                                <div class="d-flex justify-content-between">
                                    <div>
                                        @unless ($article->tags->isEmpty())
                                            <div class="text-primary">
                                                @foreach($article->tags as $tag)
                                                    #{{ $tag->name }}
                                                @endforeach
                                            </div>
                                        @endunless
                                        
                                        <div class="text-muted">
                                            {{ \Carbon\Carbon::createFromTimeString($article->published_at)->format('Y/m/d') }} 公開
                                        </div>
                                    </div>

                                    @auth
                                        <div class="index-top">
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
                                        </div>
                                    @endauth
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
        @endforeach
    </div>
</div>