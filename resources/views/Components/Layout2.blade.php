<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>PICKK's - a filipino recipe sharing platform</title>

        <!-- Add Google Font link here -->
        <link href="https://fonts.googleapis.com/css2?family=Baloo+2&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="/assets/css/home.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/layout2.css">
        @yield('additional-styles')
    </head>

    <body>

        <!-- HEADER -->
        <header>

            <div class="logo">
                <img src="/assets/images/logo.png" alt="Logo">
            </div>
    
            <nav>
                <ul>
                    <li><a href="{{ route('dashboard') }}" class="button"><b>Explore</b></a></li>
                    <li><a href="{{ route('my-recipe') }}" class="button"><b>My Recipes</b></a></li>
                    <li><a href="{{ route('menu2') }}" class="button"><b>Menu</b></a></li>
                    <li><a href="{{ route('faq2') }}" class="button"><b>FAQ</b></a></li>

                    <li class="dropdown">
                        <a href="#" class="button"><b>More</b></a>
                            <div class="dropdown-content">
                                <a href="{{ route('profile') }}">Profile</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                 {{ __('Logout') }}
                             </a>
         
                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                 @csrf
                             </form>                            
                            </div>
                    </li>
                </ul>
            </nav>

        </header>
         <!-- END OF HEADER -->

         <!-- CONTENT -->
        <div class="content">
            <!-- Page content goes here -->
            @yield ('content')   
        </div>
        <!-- END OF CONTENT -->

        <!-- FOOTER -->
        <footer>
            <p>&copy;2024 PICKK Recipe</p>
            <div class="footer-links">
                <a href="/use">Terms of Use</a>
                <a href="/privacy">Privacy Policy</a>
            </div>
        </footer>
        <!-- END OF FOOTER -->
    </body>
</html>
