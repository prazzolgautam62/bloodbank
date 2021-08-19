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
			<h3 class='text-primary'><i class="fa fa-users"></i> Edit Donor Details of {{$object->name}}</h3><hr>
		<div class="row">
        <form action="{{ action('DonorController@updateDonorDetails',$object->donor_id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name" required>Name:</label><br>
                            <input type="text" name="name" class="form-control" value="{{$object->name}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="position" required>Father's Name:</label>
                            <input type="text" name="fathers_name" class="form-control"
                                value="{{$object->fathers_name}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label class="control-label"  for="GENDER">Gender</label>
								<select id="gen" name="gender" required class="form-control input-sm">
									<option value="{{$object->gender}}" selected>{{$object->gender}}</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									<option value="Others">Others</option>

								</select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label" for="DOB">D.O.B</label>
							<input type="text" value="{{$object->dob}}" placeholder="YYYY/MM/DD" required id="DOB" name="dob"  class="form-control input-sm DATES">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label class="control-label" for="BLOOD" >Blood Group</label>
						<select id="blood" name="blood_group" required class="form-control input-sm">
							<option value="{{$object->blood_group}}" selected>{{$object->blood_group}}</option>
							<option value="A+">A+</option>
							<option value="B+">B+</option>
							<option value="O+">O+</option>
							<option value="AB+">AB+</option>
							<option value="A1+">A1+</option>
							<option value="A2+">A2+</option>
							<option value="A1B+">A1B+</option>
							<option value="A2B+">A2B+</option>
							<option value="A-">A-</option>
							<option value="B-">B-</option>
							<option value="O-">O-</option>
							<option value="AB-">AB-</option>
							</select>
                        </div>
                            <div class="form-group col-md-6">
                            <label class="control-label" for="BODY_WEIGHT" >Body Weight</label>
							<input type="text" value="{{$object->body_weight}}" required placeholder="Weight In Kgs"  name="body_weight" id="BODY_WEIGHT" class="form-control input-sm">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label class="control-label" for="EMAIL" >Email ID</label>
                                <input type="email" value="{{$object->email}}"  name="email" id="EMAIL" class="form-control" placeholder="Email Address">
                        </div>
                        <div class="form-group col-md-6">
                        <label class="control-label" for="COUNTRY">Country</label>
                                <select name="country" id="COUNTRY" required class="form-control">
								<option value="{{$selected_country->country_id}}">{{$selected_country->country_name}}</option>
                                    @foreach($countries as $data)
                                    <option value="{{ $data->country_id }}">{{ $data->country_name }}</option>
                                    @endforeach
								</select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label class="control-label" for="STATE">State</label>
                                <select name="state" id="STATE" required class="form-control">
                                     <option value="{{$selected_state->state_id}}">{{$selected_state->state_name}}</option>
                                    @foreach($states as $state)
                                     <option value="{{ $state->state_id }}">{{ $state->state_name }}</option>
                                    @endforeach
								</select>
                        </div>
                        <div class="form-group col-md-6">
                        <label class="control-label" for="CITY" >City</label>
                                <select name="city" id="CITY" required class="form-control">
                                    <option value="{{$selected_city->city_id}}">{{$selected_city->city_name}}</option>
                                    @foreach($cities as $data)
                                    <option value="{{ $data->city_id }}">{{ $data->city_name }}</option>
                                    @endforeach
								</select>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label class="control-label" for="AREA" >Area</label>

                        <select name="area" id="CITY" required class="form-control">
                            <option value="{{$selected_area->area_id}}">{{$selected_area->area_name}}</option>
                            @foreach($areas as $data)
                            <option value="{{ $data->area_id }}">{{ $data->area_name }}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="form-group col-md-6">
                        <label for="position">Pincode:</label>
                            <input type="text" name="pincode" class="form-control"
                                value="{{$object->pincode}}">
                           
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                        <label for="position">Address:</label>
                            <input type="text" name="address" class="form-control"
                                value="{{$object->address}}">
                        </div>
                        
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label class="control-label " for="CONTACT_1" >Contact-1</label>
                                <input value="{{$object->contact_1}}" type="text" required name="contact_1" id="CONTACT_1" class="form-control" placeholder="Contact No-1">
                        </div>
                        <div class="form-group col-md-6">
                        <label class="control-label " for="CONTACT_2" >Contact-2</label>
                                <input type="text" value="{{$object->contact_2}}" name="contact_2" id="CONTACT_2" class="form-control" placeholder="Contact No-2">
                        </div>
                    </div>
                    <div class="form-group">
							<label class="control-label text-primary"  for="LAST_D_DATE">Last Blood Donoted Date</label>
							<input  value="{{$object->last_donation_date}}" type="text"  name="last_donation_date"  id="LAST_D_DATE" placeholder="YYYY/MM/DD" class="form-control input-sm DATES">
						</div>
                        <label>Status</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="exampleRadios5" value="1"
                                {{ ($object->status=='1') ? "checked" : "" }}>
                            <label class="form-check-label" for="exampleRadios5">
                                Active
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="exampleRadios6" value="0"
                                {{ ($object->status=='0') ? "checked" : "" }}>
                            <label class="form-check-label" for="exampleRadios6">
                                Not Active
                            </label>
                        </div>
                       
                        <br>

                        <input type="submit" class="btn btn-primary" value="Update">
                    </form>
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
