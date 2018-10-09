<div id="header">
    <div class="top-line">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light p-0 row">
                <div class="col-1  d-lg-none">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="col-2  d-lg-none">
                    <a class="navbar-brand d-lg-none ml-4 " href="/">
                        <img src="/images/logo.png" width="60" height="30" alt="">
                    </a>
                </div>
                <div class="col-2 order-lg-0">
                    <div class="d-none d-lg-flex justify-content-start ">
                        <a class="mr-2" href="{{ LaravelLocalization::getLocalizedURL("uk") }}">
                            <img src="/images/ukraine.png" alt="Українська" title="Українська">
                        </a>
                        <a class="mr-2" href="{{ LaravelLocalization::getLocalizedURL("ru") }}">
                            <img src="/images/russia.png" alt="Русcкий" title="Русский">
                        </a>
                    </div>
                </div>
                <form class="form-inline col-5 col-lg-3 order-lg-2">
                    <input class="form-control btn-sm d-none d-sm-block w-100" type="search" placeholder="@lang('localization.search')" aria-label="@lang('localization.search')">
                </form>
                <div class="mobile-links d-lg-none col-2">
                    <div class="row">
                        <div class="col-6">
                            <a href="#">
                                <i class="fas fa-phone"></i>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="#">
                                <i class="fas fa-shopping-cart"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="collapse navbar-collapse col-lg-7 order-lg-1" id="navbarToggler">
                    <ul class="navbar-nav mt-2 mt-lg-0">
                        <li class="nav-item mr-2">
                            <a class="nav-link" href="#">@lang('localization.blog')</a>
                        </li>
                        <li class="nav-item mr-2">
                            <a class="nav-link" href="#">@lang('localization.payment')</a>
                        </li>
                        <li class="nav-item mr-2">
                            <a class="nav-link" href="#">@lang('localization.contacts')</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <div class="middle-line d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <a class="" href="/">
                        <img class="mt-1 mb-1" src="/images/logo.png" alt="Clock Shop" title="Clock Shop">
                    </a>
                </div>
                <div class="col-3 offset-3">
                    <div class="d-flex flex-column justify-content-center h-100 phones">
                        <div class="lifecell">
                            (093) 577-85-19
                        </div>
                        <div class="vodafone">
                            (095) 640-01-98
                        </div>
                        <div class="">
                            <a href="#">Передзвоніть мені</a>
                        </div>
                    </div>
                </div>
                <div class="col-3 d-flex align-items-center">
                    <a class="btn btn-success w-100 h-75" href="#">
                        <div class="basket d-flex flex-row">
                            <div class="d-inline-flex shopping-cart align-items-center justify-content-center">
                                <i class="fas fa-shopping-cart h-50 w-50"></i>
                            </div>
                            <div class="basket-info d-inline-flex p-2 justify-content-center flex-column">
                                <p class="m-0 d-flex align-items-start">@lang('localization.in_the_basket'): <strong class="ml-2">0</strong></p>
                                <p class="m-0 d-flex align-items-start">@lang('localization.total'): <strong class="ml-2">999 грн</strong></p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>