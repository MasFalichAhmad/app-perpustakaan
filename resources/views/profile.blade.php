<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
</head>
<body>
    <h1>Profil Pengguna</h1>

    <p>
        <a href="{{ route('books.index') }}">Kembali ke Buku</a>
    </p>

    @if (session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h2>Informasi Akun</h2>

    <p>Nama: {{ auth()->user()->name }}</p>
    <p>Email: {{ auth()->user()->email }}</p>
    <p>Role: {{ auth()->user()->role }}</p>

    <hr>

    <h2>Ganti Password</h2>

    <form action="{{ route('profile.password') }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="current_password">Password Lama</label><br>
            <input
                type="password"
                id="current_password"
                name="current_password"
                required
            >
        </div>

        <br>

        <div>
            <label for="password">Password Baru</label><br>
            <input
                type="password"
                id="password"
                name="password"
                minlength="8"
                required
            >
        </div>

        <br>

        <div>
            <label for="password_confirmation">
                Konfirmasi Password Baru
            </label><br>
            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                minlength="8"
                required
            >
        </div>

        <br>

        <button type="submit">Ubah Password</button>
    </form>
</body>
</html>