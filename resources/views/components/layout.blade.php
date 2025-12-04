<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
    <header>
        <nav>
            <div class="bg-dark text-center text-white py-3">
                <h1 class="h3">Product Management</h1>
            </div>
            <div class="d-flex justify-content-end mt-3 p-2">
                @guest
                <a href="{{ route('show.login') }}" class="btn btn-dark m-2"> Login</a>
                <a href="{{ route('show.register') }}" class="btn btn-dark m-2"> Register</a>
                @endguest
                @auth
                <span class="border-r-2 pr-2">
                    Hi there, {{ Auth::user()->name }}
                </span>
                    <a href="{{ route('products.view') }}" class="btn btn-dark m-2" >All Products</a>
                    <a href="{{ route('products.create') }}" class="btn btn-dark m-2"> Create New Product</a>
                    <form action="{{ route('logout')}}" class="m-2" method="POST">
                        @csrf
                        <button class="btn btn-dark"> Logout </button>
                    </form>
                @endauth
            </div>
        </nav>
    </header>

    <main class="container">
        {{ $slot }}
    </main>
</body>
</html>