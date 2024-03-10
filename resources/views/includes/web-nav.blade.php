<nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm py-3 py-lg-0 px-3 px-lg-0">
    <a href="" class="navbar-brand ms-lg-5">
        <h1 class="display-5 m-0 text-primary">Safe<span class="text-secondary">Cam</span></h1>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="{{ '/' }}" class="nav-item nav-link ">Home</a>

            @foreach (getMenuPages() as $page)
                @if (getSubMenuPages($page->id)->count())
                    <div class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle"
                            data-bs-toggle="dropdown">{{ $page->title }}</a>

                        <div class="dropdown-menu m-0">
                            @foreach (getSubMenuPages($page->id) as $subManu)
                                <a href="{{ route('page', $subManu->url_key) }}"
                                    class="dropdown-item">{{ $subManu->title }}</a>
                            @endforeach
                        </div>
                    </div>
                @else
                    <a href="{{ route('page', $page->url_key) }}" class="nav-item nav-link">{{ $page->title }}</a>
                @endif
            @endforeach
            <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>
            <a href="tel:+917232026292" class="nav-item nav-link nav-contact bg-secondary text-white px-1 ms-lg-1"><i
                    class="bi bi-telephone-outbound me-1"></i>72320 26292</a>
        </div>
    </div>
</nav>
