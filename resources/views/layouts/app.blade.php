<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'KalDo') }} - Művelődési intézmények rendezvényszervező rendszere</title>
    <meta name="description" content="KalDo - A művelődési intézmények működését segítő webalapú szoftver, amely a rendezvényszervezést, az ütközések elkerülését és az információk áramlását segíti.">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <header class="header">
        <div class="container">
            <nav class="nav">
                <a href="{{ route('home') }}" class="logo">KalDo</a>
                <ul class="nav-menu">
                    <li><a href="{{ route('home') }}">Főoldal</a></li>
                    <li><a href="{{ route('features') }}">Funkciók</a></li>
                    <li><a href="{{ route('pricing') }}">Árak</a></li>
                    <li><a href="{{ route('testimonials') }}">Vélemények</a></li>
                    <li><a href="{{ route('contact') }}">Kapcsolat</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <h3>KalDo</h3>
                    <p>A művelődési intézmények működését segítő webalapú szoftver, amely a rendezvényszervezést, az ütközések elkerülését és az információk áramlását segíti.</p>
                </div>
                <div class="col-3">
                    <h3>Linkek</h3>
                    <ul class="footer-menu">
                        <li><a href="{{ route('home') }}">Főoldal</a></li>
                        <li><a href="{{ route('features') }}">Funkciók</a></li>
                        <li><a href="{{ route('pricing') }}">Árak</a></li>
                        <li><a href="{{ route('testimonials') }}">Vélemények</a></li>
                        <li><a href="{{ route('contact') }}">Kapcsolat</a></li>
                    </ul>
                </div>
                <div class="col-3">
                    <h3>Elérhetőség</h3>
                    <div class="footer-contact">
                        <p><i class="fas fa-map-marker-alt"></i> 1234 Budapest, Példa utca 123.</p>
                        <p><i class="fas fa-phone"></i> +36 1 234 5678</p>
                        <p><i class="fas fa-envelope"></i> info@kaldo.hu</p>
                    </div>
                </div>
                <div class="col-3">
                    <h3>Hírlevél</h3>
                    <p>Iratkozz fel hírlevelünkre a friss információkért.</p>
                    <form action="{{ route('newsletter.subscribe') }}" method="POST">
                        @csrf
                        <input type="email" name="email" placeholder="E-mail címed" required>
                        <button type="submit" class="btn">Feliratkozás</button>
                    </form>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} KalDo. Minden jog fenntartva. | <a href="{{ route('terms') }}">Felhasználási feltételek</a> | <a href="{{ route('privacy') }}">Adatvédelmi irányelvek</a></p>
            </div>
        </div>
    </footer>

    <!-- Simple JavaScript for mobile menu -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile menu toggle functionality would go here if needed
        });
    </script>
</body>
</html>
