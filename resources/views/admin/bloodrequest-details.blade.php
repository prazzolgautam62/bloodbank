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
			<h3 class='text-primary'><i class="fa fa-bed"></i> Patient Details </h3><hr>
		<div class="row">


		<div class="col-md-4">
					<div class="panel">
					<div class="panel-body">
					<img src="{{asset('uploads/requests/'.$request->image)}}" class="image-rounded" height="250px" width="100%">
			</div>
			</div>

		</div>
		<div class="col-md-8">
		<table class="table table-striped">
			<tr>
				<th>Name</th>
				<td>{{$request->name}}</td>
			</tr>
			<tr>
				<th>Blood</th>
				<td>{{$request->blood_group}}</td>
			</tr>
			<tr>
				<th>UNIT</th>
				<td>{{$request->blood_unit}}</td>
			</tr>
			<tr>
				<th>Hospital</th>
				<td>{{$request->hospital}}</td>
			</tr>
			<tr>
				<th>City</th>
				<td>{{$request->city_id}}</td>
			</tr>
			<tr>
				<th>Pincode</th>
				<td>{{$request->pincode}}</td>
			</tr>
			<tr>
				<th>Doctor Name</th>
				<td>{{$request->doctor_name}}</td>
			</tr>
			<tr>
				<th>Request Date</th>
				<td>{{$request->required_date}}</td>
			</tr>
			<tr>
				<th>Contact Person</th>
				<td>{{$request->contact_name}}</td>
			</tr>
			<tr>
				<th>Address</th>
				<td>{{$request->contact_address}}</td>
			</tr>
			<tr>
				<th>Email</th>
				<td>{{$request->email}}</td>
			</tr>
			<tr>
				<th>Contact-1</th>
				<td>{{$request->contact_no1}}</td>
			</tr>
			<tr>
				<th>Contact-2</th>
				<td>{{$request->contact_no2}}</td>
			</tr>
			<tr>
				<th>Status</th>
				<td>{{$request->status}}</td>
			</tr>
			<tr>
				<th>Completed Date</th>
				<td></td>
			</tr>
		</table>
		</div>
		<div class="col-md-6">
		<h3 class='text-primary'>Any Updation</h3>
		<hr>

		<form method='post' action="">
			<div class="form-group">
				<label for="CDATE">Completed Date</label>
				<input type="text" name="CDATE"  id="CDATE" class="form-control DATES">
			</div>

			<div class="form-group">
				<label for="STATUS">Status</label>
				<select name="STATUS" required  id="STATUS" class="form-control">
					<option value="">Select Status</option>
					<option value="0">Pending</option>
					<option value="1">Not Completed</option>
					<option value="2">Completed</option>
				</select>
			</div>
			<button type='submit' class='btn btn-success ' name='submit'><i class='fa fa-edit'></i> Update Now</button>
			<a href='{{ route('admin.blood.requests')}}' class='btn btn-primary '>Back Page</a>
		</form>
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
