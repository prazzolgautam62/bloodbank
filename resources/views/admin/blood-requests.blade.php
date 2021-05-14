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

			<h3 class="text-primary"><i class="fa fa-bed"></i>  Need Blood</h3><hr>
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
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>GENDER</th>
                            <th>BLOOD GROUP</th>
                            <th>UNIT</th>
                            <th>HOSPITAL</th>
                            <th>DOCTOR NAME</th>
                            <th>REQUIRED DATE</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($requests as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->gender}}</td>
                            <td>{{$data->blood_group}}</td>
                            <td>{{$data->blood_unit}}</td>
                            <td>{{$data->hospital}}</td>
                            <td>{{$data->doctor_name}}</td>
                            <td>{{$data->required_date}}</td>
                            <td>
                                <a href="{{ route('admin.blood.details',$data->id)}}" class="btn btn-primary"> <i class="fa fa-eye"></i> </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>

			</div>
		</div>
		</div>
	</div>
</div>
@include('admin.include.admin_footer')

</body>
</html>
