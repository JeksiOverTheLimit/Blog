<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css">
    <title>Blogs</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('storage/image/logo.png') }}" alt="no picture" width="150" height="150">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        @if(auth()->check() && auth()->user()->id !== null)
                        <li class="nav-item">
                            <a class="nav-link" href="/posts/{{ auth()->user()->id }}">Мойте публикации</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/wishlist/{{ auth()->user()->id }}">WishList <span class="badge bg-secondary">{{ app('App\Http\Controllers\WishlistController')->getWishListCount() }}</span></a>
                        </li>
                        <li class="nav-item">
                            <span class="nav-link">Welcome {{ auth()->user()->name }}</span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/logout">Logout</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="/log">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/register">Register</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mt-4">
        @yield('content')
    </div>

    <footer class="bg-light py-4">
        <div class="container text-center">
            <p>&copy; 2023 Your Company. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>
