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
			<h3 class='text-primary'><i class="fa fa-bank"></i> Add City </h3><hr>
			<div class="row">
				<div class="col-md-6">

					<p id='out' class='text-success'></p>
					<form role="form" action="{{route('store.city')}}" method="post">
                        @csrf
						<div class="form-group text-primary">
							<label for="City">City Name</label>
							<input id="City" required type="text" class="form-control" name="cityname">
						</div>
						<div class="form-group text-primary">
							<label for="state">Select State</label>
							<select name="statename" required class="form-control">
								<option value="">Select State</option>
                                @foreach($states as $state)
                                <option value="{{$state->state_id}}">{{$state->state_name}}</option>
                                @endforeach
							</select>
						</div>

						<div class="form-group">
							<input type="submit" class="btn btn-primary" value="Add City">
						</div>

					</form>
				</div>
				<div class="col-md-6">

					<a href='{{ url('admin/view/city')}}' class='btn btn-primary'><i class='fa fa-edit'></i> View All</a>
				</div>
			</div>


		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script>
          $("document").ready(function() {
                    setTimeout(function() {
                        $("div.alert").remove();
                    }, 5000); // 5 secs

                });
    </script>

@include('admin.include.admin_footer')

	</body>
</html>
