<nav class="navbar navbar-dark bg-dark flex-md-nowrap p-0 shadow">
    <a class="d-none d-md-block navbar-brand border-right col-md-3 mr-0" href="#">Company name</a>
    <div class="col">
        <h1 class="h3 text-light">{{isset($data["title"]) ? $data["title"] : "Aдмін-панель" }}</h1>
    </div>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="#">Sign out</a>
        </li>
    </ul>
</nav>