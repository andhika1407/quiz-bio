<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>
</head>
<body>
    <h1>{{ isset($user) ? 'Edit User' : 'Tambah User' }}</h1>
    <form action="{{ isset($user) ? route('user.update', $user->id) : route('user.store') }}" method="POST">
        @csrf
        @if(isset($user))
            @method('PUT')
        @endif

        <label>Nama:</label>
        <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}">
        @error('name') <div>{{ $message }}</div> @enderror

        <br>

        <label>Username:</label>
        <input type="text" name="username" value="{{ old('username', $user->username ?? '') }}">
        @error('username') <div>{{ $message }}</div> @enderror

        <br>

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}">
        @error('email') <div>{{ $message }}</div> @enderror

        <br>

        <label>Password:</label>
        <input type="password" name="password">
        @if(!isset($user)) @error('password') <div>{{ $message }}</div> @enderror @endif

        <br>

        <label>Role:</label>
        <select name="role">
            <option value="peserta" {{ old('role', $user->role ?? '') == 'peserta' ? 'selected' : '' }}>Peserta</option>
            <option value="admin" {{ old('role', $user->role ?? '') == 'admin' ? 'selected' : '' }}>Admin</option>
        </select>
        @error('role') <div>{{ $message }}</div> @enderror

        <br>

        <label>Kompetisi:</label>
        <select name="competition_id">
            <option value="">-- Pilih Kompetisi --</option>
            @foreach ($competitions as $comp)
                <option value="{{ $comp->id }}" {{ old('competition_id', $user->competition_id ?? '') == $comp->id ? 'selected' : '' }}>
                    {{ $comp->nama }}
                </option>
            @endforeach
        </select>
        @error('competition_id') <div>{{ $message }}</div> @enderror

        <br><br>

        <button type="submit">Simpan</button>
    </form>

    <a href="{{ route('user.index') }}">Kembali</a>
</body>
</html>