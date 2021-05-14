<!DOCTYPE html>
<html lang="en">
	<head>
		@include('admin.include.admin_header')
	</head>
	<body>

        @include('admin.include.admin_topnav')
<div class="container"  style='margin-top:70px' >
	<div class="row">
		<div class="col-sm-3">
			@include('admin.include.admin_sidenav')
		</div>
		<div class="col-sm-9" >
			<h3 class="text-primary"><i class="fa fa-search"></i> Search Donor Details </h3><hr>
		<div class="row">
		<div class="col-md-6 col-md-offset-3">

			<form role="form">
				<div class="form-group text-primary">
					<label>Search Text</label>
					<input type="text" id="q" class="form-control">
				</div>
			</form>
		</div>
		<div class='col-md-12'>
			<div class='table-responsive' id="feedback">

			<div>
		</div>


	</div>


		</div>
	</div>
</div>

@include('admin.include.admin_footer')
  <script>

  </script>

	</body>
</html>
