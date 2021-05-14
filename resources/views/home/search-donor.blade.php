<!DOCTYPE html>
<html lang="en">
<head>
    @include('include.header')
</head>
<body>


    @include('include.navbar')
    <!-- Page Content -->
    <div class="container-fluid"  style='margin-top:70px;'>
        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
			 <h3 class=" text-primary">
					<i class='fa fa-search'></i>   Search Donor Avalibility
                </h3><hr>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <ol class="breadcrumb">
                    <li >              <a href="{{ url('donor-registration') }}" style='text-decoration:none;'><i class='fa fa-users'></i> Donor Registration</a></li>
                    <li >              <a href="{{ url('request-blood') }}" style='text-decoration:none;'><i class='fa fa-bed'></i> Need Blood </a></li>
                    <li class="active"><a href="{{ url('search-donor') }}" style='text-decoration:none;'><i class='fa fa-search'></i> Search Blood</a></li>
                </ol>
            </div>
        </div>



		  		<div class="row  centered-form ">
		    <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center" style="padding:5px;font-size:16px;font-weight:bold"><span class="fa fa-search "> </span>  Search Donor Avalibility</h3>
                    </div>
                    <div class="panel-body">
					<form action="{{ route('search.nearby.donor')}}"name="frm" id="frm" method="post" >
                        @csrf
						<div class="form-group">
							<label class="control-label text-primary">Enter Your Hospital Name</label>
								<select name="hospital_id"  id="STYPE" required class="form-control input-sm">
                                    <option disabled>Select any Hospital Below</option>
                                    @foreach($hospitals as $hosp)
                                     <option value="{{$hosp->id}}">{{$hosp->name}}</option>
                                    @endforeach
								</select>
						</div>
						<div class="form-group">
							<label class="control-label text-primary">Required Blood Group</label>
								<select name="blood_group" id="BLOOD" required  class="form-control input-sm">
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
							<!-- <option value="A2B">Bombay o+</option>
							<option value="A2B">Bombay o-</option> -->

								</select>
						</div>
						<div class="form-group">
							<label class="control-label text-primary">Enter Radius(IN Kilometers)</label>
							<input type="number" min="0" name="radius" id="str" required placeholder="Type Here" class="form-control input-sm">
						</div>

						 <div class="form-group">
							<button class="btn btn-primary" type="submit" type="button" id="submit"><i class='fa fa-search'></i> Search Donor</button>
						  </div>
                    </form>
                    </div>
                </div>
            </div>
			 <div class="col-xs-12 col-sm-12 col-md-6" id="feedback">
			 <p>
				Please fill the correct details and search your nearest donor.For more queries contact our admin.
			 </p>
			  </div>



            </div>

           </div>


 @include('include.footer')



</body>
</html>
