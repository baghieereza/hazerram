<!-- partial:../../partials/_navbar.html -->
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <img class="img-sm rounded-circle"
         src="https://farm3.staticflickr.com/2906/14387855603_f4c0891db6_o.jpg" alt="">
    <div class="mr-1">
        <b class="mr-1">{{auth()->user()->name}} </b><small class="mr-1"> ({{auth()->user()->role}}) </small>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center ltr" style="direction: ltr">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link count-indicator "  href="{{route("logout")}}"  >
                    <i class="icon-envelope mx-0"></i>
                    <span class="count"></span>
                </a>

            </li>
        </ul>
    </div>
</nav>
<!-- partial -->
