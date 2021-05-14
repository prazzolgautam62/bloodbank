    <!-- Navigation -->
    <nav class="navbar navbar-default 	 navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><i class="fa fa-heartbeat fa-lg"></i> Blood Bank</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="{{ url('/about') }}"><i class="fa fa-users"></i> About us</a></li>
                    <li><a href="{{ url('/donor-registration') }}"><i class="fa fa-briefcase"></i> Services</a></li>
                    <li><a href="{{ url('/contact') }}"><i class="fa fa-envelope"></i> Contact us</a></li>
                    @guest
                    <li><a href="{{ url('/admin')}}"><i class="fa fa-user-md"></i> Admin</a></li>
                    @else
                    <li><a href="{{ url('/admin/home')}}"><i class="fa fa-user-md"></i> Admin</a></li>
                    @endguest
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
