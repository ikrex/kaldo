<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'KalDo') }} - Bejelentkezés</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
            font-family: 'Arial', sans-serif;
        }

        .form-signin {
            width: 100%;
            max-width: 400px;
            padding: 15px;
            margin: auto;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="text"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        .logo {
            max-width: 150px;
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body class="text-center">
    <main class="form-signin">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <img class="logo" src="{{ asset('images/kaldo-logo.svg') }}" alt="KalDo">
            <h1 class="h3 mb-3 fw-normal">Bejelentkezés</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-floating">
                <input type="text" class="form-control" id="username" name="username" placeholder="Felhasználónév" value="{{ old('username') }}" required autofocus>
                <label for="username">Felhasználónév</label>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control" id="password" name="password" placeholder="Jelszó" required>
                <label for="password">Jelszó</label>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Emlékezz rám
                </label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Bejelentkezés</button>

            <p class="mt-4">
                <a href="{{ route('home') }}" class="text-decoration-none">&larr; Vissza a főoldalra</a>
            </p>

            <p class="mt-5 mb-3 text-muted">&copy; {{ date('Y') }} KalDo</p>
        </form>
    </main>
</body>
</html>
