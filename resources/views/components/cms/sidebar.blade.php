<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('index') }}">
                    <i class="fa-solid fa-user"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('category.index') }}">
                    <i class="fa-solid fa-layer-group"></i>
                    Category
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('post.index') }}">
                    <i class="fa-solid fa-file"></i>
                    Post
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('tag.index') }}">
                    <i class="fa-solid fa-tags"></i>
                    Tag
                </a>
            </li>
        </ul>
    </div>
</nav>