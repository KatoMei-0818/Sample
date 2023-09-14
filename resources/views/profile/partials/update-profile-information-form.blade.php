<section>
    <header>
        <h2 class="">
            {{ __('プロフィール情報') }}
        </h2>

    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6">
        @csrf
        @method('patch')

        <div class="form-group mb-3">
            <label for="name">名前</label><br>
            <input id="name" name="name" type="text" class="form-control mt-1" value="{{old('name', $user->name)}}" required autofocus autocomplete="name"></input>
        </div>

        <div class="form-group mb-3">
            <label for="email" >メールアドレス</label><br>
            <input id="email" name="email" type="email" class="form-control mt-1" value="{{old('email', $user->email)}}" required autocomplete="username">

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="form-group mb-3">
            <label for="profile">自己紹介</label><br>
            <textarea id="profile" name="profile" type="textarea" rows="4" class="form-control mt-1" required autofocus autocomplete="profile">{{old('profile', $user->profile)}}</textarea>

        </div>

        <div class="form-group">
            <button class="btn btn-primary form-control">{{ __('保存') }}</button>
        </div>
    </form>
</section>
