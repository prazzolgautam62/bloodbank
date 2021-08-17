
<!DOCTYPE html>
<html lang="en">
<head>
	@include('include.header')
</head>
<body>

@include('include.navbar')
    <div class="container" style='margin-top:70px;'>
        <div class="row">
            <div class="col-md-12">
                <h3 class=" text-primary">
					<i class='fa fa-users'></i> New Donor Registration
                </h3><hr>
                <div class="row">
                    <div class="col-lg-12 col-xs-12">
                        <ol class="breadcrumb">
                            <li class="active" >    <a href="{{ url('donor-registration') }}" style='text-decoration:none;'><i class='fa fa-users'></i> Donor Registration</a></li>
                            <li >                   <a href="{{ url('request-blood') }}" style='text-decoration:none;'><i class='fa fa-bed'></i> Need Blood </a></li>
                            <li>                    <a href="{{ url('search-donor') }}" style='text-decoration:none;'><i class='fa fa-search'></i> Search Blood</a></li>
                        </ol>
                    </div>
                </div>

            </div>
        </div>


			<div class="row centered-form ">
		    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center" style="padding:5px;font-size:16px;font-weight:bold"><span class="fa fa-user "> </span> JOIN AS BLOOD DONOR</h3>
                    </div>

                    <div class="panel-body">
						<form method="post" action="{{ route('register.donor')}}" autocomplete="off" role="form" enctype="multipart/form-data">
						@csrf
                            <div class="form-group">
							<label class="control-label text-primary" for="NAME" >Name</label>
							<input type="text" placeholder="Full Name" id="NAME" name="name"  required class="form-control input-sm">
						</div>
						<div class="form-group">
							<label class="control-label text-primary" for="FATHER_NAME">Father Name</label>
							<input type="text" placeholder="Father Name" id="fathers_name" name="fathers_name"  class="form-control input-sm">
						</div>

						<div class="form-group">
							<label class="control-label text-primary"  for="GENDER">Gender</label>
								<select id="gen" name="gender" required class="form-control input-sm">
									<option value="">Select Gender</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									<option value="Others">Others</option>

								</select>
						</div>

						<div class="form-group">
							<label class="control-label text-primary" for="DOB">D.O.B</label>
							<input type="text"  placeholder="YYYY/MM/DD" required id="DOB" name="dob"  class="form-control input-sm DATES">
						</div>


						<div class="form-group">
							<label class="control-label text-primary" for="BLOOD" >Blood Group</label>
						<select id="blood" name="blood_group" required class="form-control input-sm">
							<option value="">Select Blood</option>
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
						<div class="form-group">
							<label class="control-label text-primary" for="BODY_WEIGHT" >Body Weight</label>
							<input type="text" required placeholder="Weight In Kgs"  name="body_weight" id="BODY_WEIGHT" class="form-control input-sm">
						</div>
						 <div class="form-group">
								<label class="control-label text-primary" for="EMAIL" >Email ID</label>
                                <input type="email"   name="email" id="EMAIL" class="form-control" placeholder="Email Address">
                          </div>

						  <div class="form-group">
								<label class="control-label text-primary" for="COUNTRY">Country</label>
                                <select name="country" id="COUNTRY" required class="form-control">
								<option value="">Select Country</option>
                                    @foreach($countries as $data)
                                    <option value="{{ $data->country_id }}">{{ $data->country_name }}</option>
                                    @endforeach
								</select>
                          </div>

							<div class="form-group">
								<label class="control-label text-primary" for="STATE">State</label>
                                <select name="state" id="STATE" required class="form-control">
                                     <option value="">Select State</option>
                                    @foreach($states as $state)
                                     <option value="{{ $state->state_id }}">{{ $state->state_name }}</option>
                                    @endforeach
								</select>
                          </div>


						  <div class="form-group">
								<label class="control-label text-primary" for="CITY" >City</label>
                                <select name="city" id="CITY" required class="form-control">
                                    <option value="">Select City</option>
                                    @foreach($cities as $data)
                                    <option value="{{ $data->city_id }}">{{ $data->city_name }}</option>
                                    @endforeach
								</select>

                          </div>

						  <div class="form-group">
							<label class="control-label text-primary" for="AREA" >Area</label>

                                <select name="area" id="CITY" required class="form-control">
                                    <option value="">Select Area</option>
                                    @foreach($areas as $data)
                                    <option value="{{ $data->area_id }}">{{ $data->area_name }}</option>
                                    @endforeach
								</select>
                          </div>

						   					  <div class="form-group">
								<label class="control-label text-primary" for="ADDRESS">Address</label>
                                <textarea  name="address" id="ADDRESS" rows="5" style="resize:none;"class="form-control" placeholder="Full Address"></textarea>
                          </div>

						  <div class="form-group">
								<label class="control-label text-primary" for="PINCODE">Pincode</label>
                                <input type="text" required name="pincode" id="PINCODE" class="form-control" placeholder="Insert Pincode">
                          </div>

						   <div class="form-group">
								<label class="control-label text-primary" for="CONTACT_1" >Contact-1</label>
                                <input type="text" required name="contact_1" id="CONTACT_1" class="form-control" placeholder="Contact No-1">
                          </div>
						   <div class="form-group">
								<label class="control-label text-primary" for="CONTACT_2" >Contact-2</label>
                                <input type="text"  name="contact_2" id="CONTACT_2" class="form-control" placeholder="Contact No-2">
                          </div>
						  <hr>
						   <div class="form-group">
								<label class="control-label text-primary"><input type="checkbox" id="c1" >&nbsp; Voluntary Donor</label>
							</div>
							<div id="volu">
						<div class="form-group">

								<select name="voluntary"  id="VOLUNTARY"   class="form-control input-sm">
									<option value="">Select</option>
									<option value="Yes">Yes</option>
									<option selected value="No">No</option>

								</select>

                          </div>
						 <div class="form-group">
						 						<input type="text"  name="voluntary_group" id="VOLUNTARY_GROUP"  class="form-control" placeholder="Voluntary Group Name" value="Nill">
						 </div>
						<div class="form-group">
							<label class="control-label text-primary"  for="LAST_D_DATE">Last Blood Donoted Date</label>
							<input type="text"  name="last_donation_date"  id="LAST_D_DATE" placeholder="YYYY/MM/DD" class="form-control input-sm DATES">
						</div>
					</div>
						  <hr>
						  <div class="form-group" id="new">
							<label class="control-label text-primary"  for="NEW_DONOR">New Donor</label>
								<select name="new_donor"  id="NEW_DONOR"  class="form-control input-sm">
									<option value="">Select</option>
									<option value="Yes" >Yes</option>
									<option value="No" selected>No</option>

								</select>
						</div>

						<div class="form-group">
							<label class="control-label text-success" for="image" >Upload Photo</label>
							<input type="file" class="form-control"  name="image">
						  </div>

							<div class="form-group">
								<label class="control-label text-success"><input type="checkbox" checked id="c2">&nbsp; I have read the eligibility criteria and confirm that i am eligible to donate blood.</label>
								<label class="control-label text-success"><input type="checkbox" checked id="c3" >&nbsp; I agree to the Term and Conditions and consent to have my contact and donor information published to the potential blood recipients.</label>
						  </div>



						  <div class="form-group">
							<button class="btn btn-primary" type="submit" >Registar Now</button>
						  </div>
						 </form>
                    </div>
                </div>
            </div>


        </div>


    </div>

@include('include.footer')
 <script>

 </script>

</body>
</html>
