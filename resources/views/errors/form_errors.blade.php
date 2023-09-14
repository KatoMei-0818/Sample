@if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li class="mx-3">{{ $error }}</li>
        @endforeach
    </ul>
@endif