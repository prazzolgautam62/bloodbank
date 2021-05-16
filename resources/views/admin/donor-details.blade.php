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
			<h3 class='text-primary'><i class="fa fa-users"></i> Donor Details </h3><hr>
		<div class="row">

		<div class="col-md-4">
					<div class="panel">
					<div class="panel-body">
					<img src="{{asset('uploads/donors/'.$donor->image)}}" class="image-rounded" height="250px" width="100%">
			</div>
			</div>

		</div>
		<div class="col-md-8">
		<table class="table table-striped">
			<tr>
				<th>Name</th>
				<td>{{$donor->name}}</td>
			</tr>
			<tr>
				<th>Father Name</th>
				<td>{{$donor->fathers_name}}</td>
			</tr>
			<tr>
				<th>Gender</th>
				<td>{{$donor->gender}}</td>
			</tr>
			<tr>
				<th>D.O.B</th>
				<td>{{$donor->dob}}</td>
			</tr>
			<tr>
				<th>Blood Group</th>
				<td>{{$donor->blood_group}}</td>
			</tr>
			<tr>
				<th>Body Weight</th>
				<td>{{$donor->body_weight}}</td>
			</tr>
			<tr>
				<th>Email</th>
				<td>{{$donor->email}}</td>
			</tr>
			<tr>
				<th>Address</th>
				<td>{{$donor->address}}</td>
			</tr>
			<tr>
				<th>Area</th>
				<td>{{$donor->area_name}}</td>
			</tr>
			<tr>
				<th>City</th>
				<td>{{$donor->city_name}}</td>
			</tr>
			<tr>
				<th>Pincode</th>
				<td>{{$donor->pincode}}</td>
			</tr>
			<tr>
				<th>State</th>
				<td>{{$donor->state_name}}</td>
			</tr>

			<tr>
				<th>Contact-1</th>
				<td>{{$donor->contact_1}}</td>
			</tr>
			<tr>
				<th>Contact-2</th>
				<td>{{$donor->contact_2}}</td>
			</tr>
			<tr>
				<th>Voluntary</th>
				<td>{{$donor->voluntary}}</td>
			</tr>
			<tr>
				<th>Group</th>
				<td>{{$donor->voluntary_group}}</td>
			</tr>
			<tr>
				<th>Is New Donor</th>
				<td>{{$donor->new_donor}}</td>
			</tr>

			<tr>
				<th>Last Donoted Date</th>
				<td>{{$donor->last_donation_date}}</td>
			</tr>

			<tr>
				<th>Status</th>
				<td>  @if($donor->status == 0)
                    INACTIVE
                    @elseif($donor->status == 1)
                    ACTIVE
                    @endif</td>
			</tr>

		</table>
		</div>


<div class="form-row">


		<form class="col-md-6" method="post" action="{{route('update.donors.status',$donor->donor_id)}}">
            @csrf
            <div class="form-group">
                <label class="control-label text-primary" for="ldata">Donor Status</label>
				<select name="status"  id="STATUS" class="form-control">
					<option value="">Select Status</option>
                    <option value="1">Active</option>
					<option value="0">In Active</option>
				</select>
                <br>
                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i>Update Status</button>

			</div>
        </form>

            <form class="col-md-6" method="post" action="{{ route('update.last.donation.date',$donor->donor_id)}}">
                @csrf
                <div class="form-group">
                    <label class="control-label text-primary" for="ldata">Last Donate Date</label>
                    <input type="text" name="last_donation_date" placeholder="YYYY/MM/DD"  id="ldata" name="ldata"  class="form-control input-sm DATES">
                </div>

                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Save Changes</button>

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
