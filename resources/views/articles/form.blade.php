<div class="form-group mb-3">
    {!! Form::label('title', 'タイトル') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group mb-3">
    {!! Form::label('body', '本文') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group mb-3">
    {!! Form::label('published_at', '公開日') !!}
    {!! Form::input('date', 'published_at', $published_at, ['class' => 'form-control']) !!}
</div>

<div class="form-group mb-3">
    <label class="col-md-4 control-label">タグ</label>
    <div class="col-md-6  w-100">
        {!! Form::select('tags[]', $tag_list, null, ['class' => 'form-control js-multiple', 'multiple' => 'multiple']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::submit($submitButton, ['class' => 'btn btn-primary form-control']) !!}
</div>