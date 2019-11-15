<!DOCTYPE html>
<html lang="{{config("app.locale")}}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Admin, Dashboard, Bootstrap"/>
    <link rel="shortcut icon" sizes="196x196" href="/admin_assets/images/logo.png">
    <title>{{config("app.name")}}</title>
    @include("admin.inc.head")
    @yield("css")
</head>

<body class="menubar-left menubar-unfold menubar-light theme-primary">
<!--============= start main area -->

<!-- APP NAVBAR ==========-->
@include("admin.inc.app-navbar")
<!--========== END app navbar -->

<!-- APP ASIDE ==========-->
@include("admin.inc.aside")
<!--========== END app aside -->

<!-- navbar search -->
<div id="navbar-search" class="navbar-search collapse">
    <div class="navbar-search-inner">
        <form action="#">
            <span class="search-icon"><i class="fa fa-search"></i></span>
            <input class="search-field" type="search" placeholder="search..."/>
        </form>
        <button type="button" class="search-close" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false">
            <i class="fa fa-close"></i>
        </button>
    </div>
    <div class="navbar-search-backdrop" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false"></div>
</div><!-- .navbar-search -->

<!-- APP MAIN ==========-->
<main id="app-main" class="app-main">
    <div class="wrap">
        <section class="app-content">
            <div class="row">
                @yield("content")
            </div><!-- .row -->
        </section><!-- #dash-content -->
    </div><!-- .wrap -->
    <!-- APP FOOTER -->
    <div class="wrap p-t-0">
        <footer class="app-footer">
            <div class="clearfix">
                <ul class="footer-menu pull-right">
                    <li><a href="javascript:void(0)">GY <i class="fa fa-angle-up m-l-md"></i></a></li>
                </ul>
                <div class="copyright pull-left">Copyright 2019 &copy;</div>
            </div>
        </footer>
    </div>
    <!-- /#app-footer -->
</main>
<!--========== END app main -->

<!-- APP CUSTOMIZER -->
<div id="app-customizer" class="app-customizer">
    <a href="javascript:void(0)"
       class="app-customizer-toggle theme-color"
       data-toggle="class"
       data-class="open"
       data-active="false"
       data-target="#app-customizer">
        <i class="fa fa-gear"></i>
    </a>
    <div class="customizer-tabs">
        <!-- tabs list -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#menubar-customizer" aria-controls="menubar-customizer" role="tab" data-toggle="tab">Menubar</a></li>
            <li role="presentation"><a href="#navbar-customizer" aria-controls="navbar-customizer" role="tab" data-toggle="tab">Navbar</a></li>
        </ul><!-- .nav-tabs -->

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane in active fade" id="menubar-customizer">
                <div class="hidden-menubar-top hidden-float">
                    <div class="m-b-0">
                        <label for="menubar-fold-switch">Fold Menubar</label>
                        <div class="pull-right">
                            <input id="menubar-fold-switch" type="checkbox" data-switchery data-size="small" />
                        </div>
                    </div>
                    <hr class="m-h-md">
                </div>
                <div class="radio radio-default m-b-md">
                    <input type="radio" id="menubar-light-theme" name="menubar-theme" data-toggle="menubar-theme" data-theme="light">
                    <label for="menubar-light-theme">Light</label>
                </div>

                <div class="radio radio-inverse m-b-md">
                    <input type="radio" id="menubar-dark-theme" name="menubar-theme" data-toggle="menubar-theme" data-theme="dark">
                    <label for="menubar-dark-theme">Dark</label>
                </div>
            </div><!-- .tab-pane -->
            <div role="tabpanel" class="tab-pane fade" id="navbar-customizer">
                <!-- This Section is populated Automatically By javascript -->
            </div><!-- .tab-pane -->
        </div>
    </div><!-- .customizer-taps -->
    <hr class="m-0">
    <div class="customizer-reset">
        <button id="customizer-reset-btn" class="btn btn-block btn-outline btn-primary">Reset</button>
    </div>
</div><!-- #app-customizer -->

<!-- SIDE PANEL -->

@include('admin.inc.script')
@yield("js")
</body>
</html>
