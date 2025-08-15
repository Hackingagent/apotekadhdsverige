<!-- CSS -->
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

<!-- JavaScript (with Popper.js included) -->
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
<header class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="fas fa-prescription-bottle-alt me-2"></i> PharmaCare
            </a>

            <!-- Language Switcher -->
            <div class="dropdown me-3">
                <button class="btn btn-sm btn-outline-light dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown">
                    <i class="fas fa-language me-1"></i> {{ strtoupper(app()->getLocale()) }}
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="?lang=en">English</a></li>
                    <li><a class="dropdown-item" href="?lang=fr">Français</a></li>
                    <li><a class="dropdown-item" href="?lang=es">Español</a></li>
                    <li><a class="dropdown-item" href="?lang=de">Deutsch</a></li>
                </ul>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categories
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                            <li><a class="dropdown-item" href="/category">Pain Relief</a></li>
                            <li><a class="dropdown-item" href="/category">Cold & Flu</a></li>
                            <li><a class="dropdown-item" href="/category">Vitamins</a></li>
                            <li><a class="dropdown-item" href="/category">First Aid</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/product">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">Contact</a>
                    </li>
                </ul>

                <div class="d-flex">
                    <form class="d-flex me-2" action="/search">
                        <div class="input-group">
                            <input class="form-control" type="search" placeholder="Search medicines..." name="query">
                            <button class="btn btn-outline-light" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>

                    <div class="d-flex">
                        <a href="/cart" class="btn btn-outline-light position-relative me-2">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-accent">
                                2
                            </span>
                        </a>
                        <a href="/login" class="btn btn-outline-light">
                            <i class="fas fa-user"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>