<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <title>Admin</title>
</head>
<body>
    <div class="admin">
        <h1>店舗代表者を作成する</h1>
        <form action="admin/create" method="post">
        @csrf
            <p>代表者名</p>
            <input type="text" name="name">
            <p>メールアドレス</p>
            <input type="text" name="email">
            <p>パスワード</p>
            <input type="text" name="password">
            <br>
            <button>送信</button>
        </form>
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('admin.logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('ログアウト') }}
                        </x-dropdown-link>
                    </form>
    </div>
</body>  
