@extends('layout')
 
@section('content')
    <h2 class="mytitle mb-4">このサイトについて</h2>

    <div class="rounded bg-white mb-3 p-5 shadow fs-5">
        <h3>概要</h3>
        このウェブサイトは簡単なブログ投稿サイトです。<br>
        自分でブログを書いて投稿したり、他の人の投稿を見ることができます。<br>
        また、ログイン状態かどうかで表示される内容も変化します。
    </div>

    <div class="rounded bg-white mb-3 p-5 shadow fs-5">
        <h3>開発環境</h3>
        Visual Studio Code 1.82.2 (user setup)<br>
        XAMPP for Windows 8.2.4<br>
        Composer version 2.5.8<br>
        Node.js v18.17.1<br>
        PHP Version 8.2.4<br>
        Laravel Framework 10.20.0<br>
        Breeze<br>
        Laravel-admin Version   1.8.17
        
    </div>

    <div class="rounded bg-white mb-3 p-5 shadow fs-5">
        <h3>ページについて</h3>

        <div class="mb-3">
            各ページについての細かい仕様について説明します。
        </div>

        <div class="px-2 mb-4">
            <h4>ホーム</h4>
            公開日が現在時刻以前の全ての投稿が、作成日の降順に表示されています。<br>
            検索ボタンを押すと、「タイトル」「タグ」「投稿者」の条件から好きな条件を1つまたは複数選び、部分一致検索を行います。<br>
            投稿をクリックすると本文が表示されます。<br>
            また、ログイン状態の場合はお気に入り登録ボタンも表示されます。
        </div>

        <div class="px-2 mb-4">
            <h4>概要</h4>
            このサイトについての細かい仕様や説明が書かれています。
            
        </div>

        <div class="px-2 mb-4">
            <h4>問い合わせ</h4>
            
        </div>

        <div class="px-2 mb-4">
            <h4>ログイン</h4>
            Breezeを使用したログイン画面です。<br>
            作成済みのアカウントがある場合はこの画面からログインすることができます。
        </div>

        <div class="px-2 mb-4">
            <h4>アカウント登録</h4>
            Breezeを使用したアカウント登録画面です。<br>
            この画面から新しくアカウントを作成することができます。
        </div>

        <div class="px-2 mb-4">
            <h4>プロフィール</h4>
            名前、メールアドレス、自己紹介などのプロフィール情報やパスワードの変更、アカウントの削除ができます。
        </div>

        <div class="px-2 mb-4">
            <h4>ダッシュボード</h4>
            新しい投稿を作成したり、自分の投稿一覧やお気に入り登録した投稿を見ることができます。<br>
            自分の投稿が表示されるページでは、公開日が現在時刻以降のものも含めた全ての投稿が表示されます。<br>
            お気に入り登録した投稿が表示されるページでは、お気に入り登録した投稿のみが表示されます。
        </div>

        <div class="px-2 mb-4">
            <h4>タグ一覧</h4>
            現在存在しているタグの一覧が表示されています。<br>
            また、新しいタグの作成や既存のタグの編集、削除ができます。
        </div>

        <div class="px-2 mb-4">
            <h4>ユーザーページ</h4>
            特定の投稿者の投稿者名や自己紹介、公開日が現在時刻以前の投稿が表示されます。
        </div>

        <div class="px-2 mb-4">
            <h4></h4>
            
        </div>
        
    </div>

    <div class="rounded bg-white mb-3 p-5 shadow fs-5">
        <h3>投稿について</h3>
        
    </div>

    <div class="rounded bg-white mb-3 p-5 shadow fs-5">
        <h3>アピールポイント</h3>
        背景をグラデーションにしています。
        
    </div>

@endsection