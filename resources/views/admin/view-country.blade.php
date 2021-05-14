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
			<h3><i class="fa fa-bank"></i> View Country Listing </h3><hr>

				<div class="col-md-12">
                    <div class="table-responsive">

                        <table class="table table-striped">

                            <thead>
                                <tr>
                                   <th>Country ID</th>
                                   <th>Country Name</th>
                                   <th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($countries as $country)

                                <tr>
                                    <td>{{$country->country_id}}</td>
                                    <td>{{$country->country_name}}</td>

                                    <td><form method="POST" action="{{route('delete.country', $country->country_id)}}">
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
       if(!confirm('Are you sure you want to delete this Country?')) {
           e.preventDefault();
       }
   });
</script>

@include('admin.include.admin_footer')

	</body>
</html>
