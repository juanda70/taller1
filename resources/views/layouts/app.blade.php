<!doctype html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
    <title>@yield('title', 'Cat\'s lover Store ')</title>
</head>

<body>
    <!-- header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary py-4">
        <div class="container">
            <a class="navbar-brand" href="{{route('home.index')}}">
                Cat's lover Store

                <i class="fa-solid fa-cat"></i>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" href="{{route('home.index')}}"><i class="fa-solid fa-house"></i></a>
                    <a class="nav-link active" href="{{ route('product.index') }}"> @lang('Products')</a>

                    <div class="vr bg-white mx-2 d-none d-lg-block"></div>
                    @auth
                    <a class="nav-link active" href="{{route('cart.index')}}">

                        <i class="fa-solid fa-cart-shopping"></i>

                        <div class="badge">

                            {{Cart::session(auth()->id())->getContent()->count()}}
                        </div>
                    </a>
                    @endauth
                    @guest
                    <a class="nav-link active" href="{{ route('login') }}">{{ __('message.Login')}}</a>
                    <a class="nav-link active" href="{{ route('register') }}">{{ __('message.Register')}}</a>
                    @else
                    <a class="nav-link active" href="{{ route('pet.index') }}">{{ __('message.Pets')}}</a>
                    <a class="nav-link active" href="{{ route('pet.create') }}">{{ __('message.Create pet')}}</a>
                    <a class="nav-link active" href="{{ route('myaccount.orders') }}">{{ __('message.My Orders')}}</a>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('wishlist.index') }}">
                            Wishlist
                        </a>
                    </li>
                    <form id="logout" action="{{ route('logout') }}" method="POST">
                        <a role="button" class="nav-link active"
                            onclick="document.getElementById('logout').submit();">{{ __('message.Logout')}}</a>
                        @csrf
                    </form>
                    @endguest
                </div>
            </div>
        </div>
    </nav>
    <header class="masthead bg-primary text-white text-center py-4">
        <div class="container d-flex align-items-center flex-column">
            <h2>@yield('subtitle', 'A Laravel EAFIT App')</h2>
        </div>
    </header>
    <!-- header -->
    <div class="container my-4">
        @yield('content')
    </div>

    <!-- footer -->
    <div class="copyright py-4 text-center text-white">
        <div class="container">
            <small>
                Copyright - <a class="text-reset fw-bold text-decoration-none" target="_blank" href="">
                    Cat's lover
                </a>
            </small>
        </div>
    </div>
    <!-- footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>

</body>

</html>
