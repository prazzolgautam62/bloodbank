<!DOCTYPE html>
<html lang="en">
	<head>
        @include('admin.include.admin_header')
	</head>
	<body>

        @include('admin.include.admin_topnav')
<div class="container">
	<div class="row">
		<div class="col-sm-3">
            @include('admin.include.admin_sidenav')
		</div>
		<div class="col-sm-9" >
			<h3><i class="fa fa-bank"></i> View City Listing </h3><hr>

				<div class="col-md-12">
                    <div class="table-responsive">

                        <table class="table table-striped">

                            <thead>
                                <tr>
                                   <th>CITY ID</th>
                                   <th>CITY NAME</th>
                                   <th>STATE NAME</th>
                                   <th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cities as $city)

                                <tr>
                                    <td>{{$city->city_id}}</td>
                                    <td>{{$city->city_name}}</td>
                                    <td>{{$city->state_name}}</td>

                                    <td><form method="POST" action="{{route('delete.city', $city->city_id)}}">
                                        @csrf
                                        <input name="_method" type="hidden" value="POST">
                                        <button type="submit" class="btn btn-sm btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'> <i class="fa fa-trash"> </i></button>
                                    </form>
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
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script>
    $('.show_confirm').click(function(e) {
       if(!confirm('Are you sure you want to delete this City?')) {
           e.preventDefault();
       }
   });
</script>

@include('admin.include.admin_footer')

	</body>
</html>
