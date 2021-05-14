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
		<div class='alert alert-success fade in' ><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Success : </strong> Status Updated Success.</div>

		<div class="col-md-4">
					<div class="panel">
					<div class="panel-body">
					<img src="" class="image-rounded" height="300px" width="100%">
			</div>
			</div>

		</div>
		<div class="col-md-8">
		<table class="table table-striped">
			<tr>
				<th>Name</th>
				<td></td>
			</tr>
			<tr>
				<th>Blood</th>
				<td></td>
			</tr>
			<tr>
				<th>UNIT</th>
				<td></td>
			</tr>
			<tr>
				<th>Hospital</th>
				<td></td>
			</tr>
			<tr>
				<th>City</th>
				<td></td>
			</tr>
			<tr>
				<th>Pincode</th>
				<td></td>
			</tr>
			<tr>
				<th>Doctor Name</th>
				<td></td>
			</tr>
			<tr>
				<th>Request Date</th>
				<td></td>
			</tr>
			<tr>
				<th>Contact Person</th>
				<td></td>
			</tr>
			<tr>
				<th>Address</th>
				<td></td>
			</tr>
			<tr>
				<th>Email</th>
				<td></td>
			</tr>
			<tr>
				<th>Contact-1</th>
				<td></td>
			</tr>
			<tr>
				<th>Contact-2</th>
				<td></td>
			</tr>
			<tr>
				<th>Status</th>
				<td></td>
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
			<a href='admin_need_blood.php' class='btn btn-primary '>Back Page</a>
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
