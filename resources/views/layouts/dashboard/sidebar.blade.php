<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.dashboard')}}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.book.index')}}">
                <i class="icon-book menu-icon"></i>
                <span class="menu-title">Books</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.author.index')}}">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Authors</span>
            </a>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.publisher.index')}}">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Publishers</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.category.index')}}">
                <i class="icon-grid-2 menu-icon"></i>
                <span class="menu-title">Categories</span>
            </a>
        </li>
    </ul>
</nav>
