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
            <p>代表者名</p><span>必須</span>
            <input type="text" name="name">
            @error('name')
                <span>{{$message}}</span>
            @enderror
            <p>メールアドレス</p><span>必須</span>
            <input type="text" name="email">
            @error('email')
                <span>{{$message}}</span>
            @enderror
            <p>パスワード</p><span>必須</span>
            <input type="text" name="password">
            @error('password')
                <span>{{$message}}</span>
            @enderror
            <br>
            <button>送信</button>
        </form>
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf

            <x-dropdown-link :href="route('admin.logout')"
                    onclick="event.preventDefault();
                    this.closest('form').submit();">
                {{ __('ログアウト') }}
            </x-dropdown-link>
        </form>
        <div class="mail">
            <p>メールを送る</p>
            <form action="mail" method="post">
                @csrf
                <select name="id">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                <button>メールを送る</button>
            </form>
        </div>

    </div>
</body>  
