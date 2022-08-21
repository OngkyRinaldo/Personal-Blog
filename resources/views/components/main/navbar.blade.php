<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('guest.index') }}"><img src="{{ asset('assets/img/blog.png') }}"
                alt="blog.png" class="img-navbar d-inline-block me-2"> Personal
            <strong>Blog</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('guest.index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('guest.categories') }}">Category</a>
                </li>
                @guest
                <li class="nav-item">
                    <a class="nav-link" href=" {{ route('home')
                        }}">Log In</a>
                </li>

                @else
                <li class="nav-item">
                    <a class="nav-link" href=" {{ route('index') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=" {{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>

                @endguest
            </ul>
        </div>
    </div>
</nav>