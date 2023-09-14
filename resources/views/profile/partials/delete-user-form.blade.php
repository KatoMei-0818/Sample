<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('アカウント削除') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('アカウントが削除されると、そのリソースとデータはすべて完全に削除されます。 アカウントを削除する前に、保持したいデータや情報をダウンロードしてください。') }}
        </p>
    </header>

    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-danger" />

    <button type="button" class="btn btn-danger m-1" data-bs-toggle="modal" data-bs-target="#deleteModal">
        {{ __('アカウント削除') }}
    </button>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-end">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button><br>
                    </div>
                    <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                        @csrf
                        @method('delete')

                        <h4 class="">
                            アカウントを削除してもよろしいですか?
                        </h4>

                        <div>
                            <label for="password">パスワードを入力してください</label><br>
                            <input id="password" type="password" name="password" class="mt-2 form-control"></input>
                        </div>
                    
                        <div class="mt-3 text-end">
                            <button class="btn btn-danger ml-3">
                                {{ __('アカウント削除') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>
