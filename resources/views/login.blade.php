<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Login</h1>
    <form method="POST" action="{{ url('/login') }}">
        @csrf

        <label>Username:</label>
        <input type="text" name="username" value="{{ old('username') }}">
        @error('username') <div>{{ $message }}</div> @enderror

        <br>

        <label>Password:</label>
        <input type="password" name="password">
        @error('password') <div>{{ $message }}</div> @enderror

        <br>

        <label>
            <input type="checkbox" name="remember"> Remember Me
        </label>

        <br><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>