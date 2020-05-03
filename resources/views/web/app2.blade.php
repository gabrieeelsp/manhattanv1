<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/web_style.css">
    <title>Hello, world!</title>
  </head>
  <body>
    <div id="header-area">
        <div class="header-top bg-dark">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark d-flex justify-content-between">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <span>Baigorria 1306, Rosario</span>
                        </li>
        
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <span> <i class="fab fa-whatsapp"></i>  +54 9 341 5 000306</span>
                        </li>
        
                    </ul>
                </nav>
            </div>
        </div>
        <div class="main-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div id="logo">
                            <a href="/">
                                <img src="/images/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group principal-search">
                            
                            <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Buscar...">
                            <div class="input-group-append">
                                <div class="input-group-text"><a href="#"><i class="fas fa-search"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="main-menu">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">            

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Productos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Novedades</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contacto</a>
                            </li>
                        </ul>
                        
                    </div>
                </nav>
            </div>
        </div>
    </div>


    @yield('content')

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>