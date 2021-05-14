
<!DOCTYPE html>
<html lang="en">
<head>
    @include('include.header')

</head>
<body>

    @include('include.navbar')

    <div class="container"  style='margin-top:70px;'>
        <div class="row">
            <div class="col-lg-12">
				 <h3 class=" text-primary">
					<i class='fa fa-heart'></i>  Need Blood To Save Life
                </h3><hr>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <ol class="breadcrumb">
                    <li  >              <a href="{{ url('donor-registration') }}" style='text-decoration:none;'><i class='fa fa-users'></i> Donor Registration</a></li>
                    <li class="active"> <a href="{{ url('request-blood') }}" style='text-decoration:none;'><i class='fa fa-bed'></i> Need Blood </a></li>
                    <li>                <a href="{{ url('search-donor') }}" style='text-decoration:none;'><i class='fa fa-search'></i> Search Blood</a></li>
                </ol>
            </div>
        </div>






		<div class="row centered-form">
		    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center" style="padding:5px;font-size:16px;font-weight:bold"><span class="fa fa-envelope "> </span> Need Blood To Save Lifes</h3>
                    </div>
                    <div class="panel-body">

					<form method="post"  action="{{ route('send.blood.request')}}" enctype="multipart/form-data">
						@csrf
                        <div class="form-group">
							<label class="control-label text-primary">Patient Name</label>
							<input type="text" placeholder="Patient Name" name="name"  required id="NAME" class="form-control input-sm">
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
							<label class="control-label text-primary">Required Blood Group</label>
								<select name="blood_group" id="BLOOD" required  class="form-control input-sm">
							<option value="">Select Blood Group</option>
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
							<option value="A1-">A1-</option>
							<option value="A2-">A2-</option>
							<option value="A1B">A1B-</option>
							<option value="A2B">A2B-</option>


								</select>
						</div>
						 <div class="form-group">
								<label class="control-label text-primary">Need Unit Of Blood</label>
                                <input type="text" required name="blood_unit" id="BUNIT" class="form-control" placeholder="Insert No Of Unit">
                          </div>
						<div class="form-group">
								<label class="control-label text-primary">Hospital Name &amp; Address</label>
                                <textarea required name="hospital" id="HOSP" rows="5" style="resize:none;"class="form-control" placeholder="Hospital Full Address"></textarea>
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
								<label class="control-label text-primary">Pincode</label>
                                <input type="text" required name="pincode" id="PIN" class="form-control" placeholder="Insert Pincode">
                          </div>
						  <div class="form-group">
							<label class="control-label text-primary">Doctor Name</label>
							<input type="text" name="doctor_name" placeholder="Doctor Name" class="form-control input-sm" id="DOC">
						</div>
						<div class="form-group">
							<label class="control-label text-primary">When Required</label>
							<input type="text" placeholder="MM/DD/YYYY" class="form-control input-sm DATES" name="required_date" id="RDATE">
						</div>

						<div class="form-group">
							<label class="control-label text-primary">Contact Name</label>
							<input type="text" placeholder="Contact Name" class="form-control input-sm" name="contact_name" id="CNAME">
						</div>
						<div class="form-group">
								<label class="control-label text-primary">Address</label>
                                <textarea required name="contact_address" id="CADDRESS" rows="5" style="resize:none;"class="form-control" placeholder="Full Address"></textarea>
                          </div>
						<div class="form-group">
							<label class="control-label text-primary">Email ID</label>
							<input type="text" placeholder="Contact Email" class="form-control input-sm" name="email" id="EMAIL">
						</div>
						<div class="form-group">
							<label class="control-label text-primary">Contact No-1</label>
							<input type="text" placeholder="Contact Number" class="form-control input-sm" name="contact_no1" id="CON1">
						</div>
							<div class="form-group">
							<label class="control-label text-primary">Contact No-2</label>
							<input type="text" placeholder="Contact Number" class="form-control input-sm" name="contact_no2" id="CON2">
						</div>
						<div class="form-group">
								<label class="control-label text-primary">Reason For Blood</label>
                                <textarea required name="reason" id="REASON" rows="5" style="resize:none;"class="form-control" placeholder="Reason For Blood" name="REASON" id="REASON"></textarea>
                          </div>
						  	<div class="form-group">
							<label class="control-label text-primary" >Upload Photo</label>
							<input type="file" name="image" id="PIC">
						  </div>


						   <div class="form-group">
							<button class="btn btn-primary" id="BTN" type="submit"><i class="fa fa-send"></i> Request Now</button>
						  </div>
						 </form>
                    </div>
                </div>
            </div>
            </div>

        </div>


 @include('include.footer')


</body>
</html>
