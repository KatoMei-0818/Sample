<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('パスワード変更') }}
        </h2>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="form-group mb-3">
            <label for="current_password">現在のパスワード</label><br>
            <input id="current_password" name="current_password" type="password" class="form-control mt-1" autocomplete="current-password"></input>
        </div>

        <div class="form-group mb-3">
            <label for="password">新しいパスワード</label><br>
            <input id="password" name="password" type="password" class="form-control mt-1" autocomplete="new-password"></input>
        </div>

        <div class="form-group mb-3">
            <label for="password_confirmation">パスワードの確認</label><br>
            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control mt-1" autocomplete="new-password"></input>
        </div>

        <div class="form-group mb-3 mb-3">
            <button class="btn btn-primary form-control">{{ __('保存') }}</button>
        </div>
    </form>
</section>
