<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Minha Loja de Sapatos</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="\images\logo.jpg" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="\css\styles.css" rel="stylesheet" />
    </head>
    <body>
         <!-- Navigation-->
         <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="{{route('admin.vendas.index')}}">Minha Loja de Sapatos</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @if (Route::has('login'))
                    @auth
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Vendas</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{route('admin.vendas.registros')}}">Registros das Vendas</a></li>
                                </ul>
                            </li>
                        </ul>
                            <a href="#" onclick="event.preventDefault(); document.querySelector('form.logout').submit();" class="nav-link" style="text-decoration: none; color: rgba(0, 0, 0, 0.55)">Sair</a>
                            <form action="{{route('logout')}}" class="logout" method="post" style="display: none;">
                                @csrf
                            </form>
                    @else
                        <a href="{{route('login')}}" class="text-sm" style="text-decoration: none; color: rgba(0, 0, 0, 0.55)">Log in</a> 
                        &nbsp; &nbsp; &nbsp;
                        @if (Route::has('register'))
                                <a href="{{route('register')}}" class="ml-4 text-sm" style="text-decoration: none; color: rgba(0, 0, 0, 0.55)">Register</a>
                        @endif
                    @endauth
                @endif
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5" style="margin-bottom: 40px;">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Sapatos que estão em Moda?</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Você só encontra aqui!</p>
                </div>
            </div>
        </header>
            <div class="container">
                @include('flash::message')
                @yield('content')
            </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Minha Loja de Sapatos</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js\scripts.js"></script>        
    </body>
</html>