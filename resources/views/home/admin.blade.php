<!DOCTYPE html>
<html lang="en">

<head>

    @include('include.header')

</head>

<body>

    @include('include.navbar')

    <!-- Navigation -->


    <!-- Page Content -->
    <div class="container" style="margin-top:70px;">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header text-primary"><i class='fa fa-user-md'></i> Admin Login

                </h1>

            </div>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
			    	  	<div class="form-group">
							 <label for="user_name" class="text-primary">User Name</label>
                             <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                             @error('email')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
			    		</div>
			    		<div class="form-group">
							<label for="pass" class="text-primary">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
			    		</div>


			    		<button class="btn btn-primary pull-right" name="submit" type="submit"><i class="fa fa-sign-in"></i> Login Here</button>
			      	</form>
				</div>
				<div class="col-md-3"></div>
			</div>
        </div>
        <!-- /.row -->




     @include('include.footer')

        </div>


</body>

</html>
