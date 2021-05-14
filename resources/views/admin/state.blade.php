
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
			<h3 class='text-primary'><i class="fa fa-bank"></i> Add State </h3><hr>
			<div class="row">
				<div class="col-md-6">

					<form role="form" action="{{ route('store.state')}}" method="post">
                        @csrf
						  <div class="form-group">
								<label class="control-label text-primary" for="COUNTRY">Country</label>
                                <select name="COUNTRY" id="COUNTRY" required class="form-control">
								<option value="">Select Country</option>
                                    @foreach($countries as $country)
                                    <option value="{{$country->country_id}}">{{$country->country_name}}</option>
                                    @endforeach
								</select>
                          </div>
						<div class="form-group text-primary">
							<label for="state">State Name</label>
							<input id="state" required type="text" class="form-control" name="statename">
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-primary" name='state_submit' value="Add State">
						</div>

					</form>
				</div>
				<div class="col-md-6">
					<a href='{{ route('view.state')}}' class='btn btn-primary'><i class='fa fa-edit'></i> View All</a>
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
