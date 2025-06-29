<!-- Navbar Right Menu -->
<div class="navbar-custom-menu">
    <ul class="nav navbar-nav">

        <!-- User Account Menu -->
        <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="/tema/dist/img/avatar.png" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs" style="color: black">{{Auth::user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header" style="background-color: #fe8c00">
                    <img src="/tema/dist/img/avatar.png" class="img-circle" alt="User Image">

                    <p style="color: black">
                        {{Auth::user()->name}}
                        <small></small>
                    </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    {{-- <div class="pull-left">
                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div> --}}
                    <div class="pull-right">
                        <a href="/logout" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i>Logout</a>
                    </div>
                </li>
            </ul>
        </li>

    </ul>
</div>