
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
			<h3 class="text-success"><i class="fa fa-users"></i> {{$status}} Donor Details </h3><hr>
		<div class="row">

		<div class='col-md-12'>
			<div class='table-responsive' id="feedback">
                <table class="table table-striped">
                    <thead>

                        <tr>
                           <th> DONOR ID
                        </th>
                        <th>
                            DONOR NAME
                        </th>
                        <th>
                            FATHER'S NAME
                        </th>
                        <th>
                            GENDER
                        </th>
                        <th>
                            DOB
                        </th>
                        <th>
                           EMAIL
                        </th>
                        <th>
                            LAST DONATION DATE
                        </th>
                        <th>
                            VOLUNTARY DONOR
                        </th>
                        <th>
                            STATUS
                        </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($donors)>0)
                        @foreach($donors as $donor)
                        <tr>
                            <td> {{$donor->donor_id}}
                         </td>
                         <td>
                            {{$donor->name}}
                         </td>
                         <td>
                            {{$donor->fathers_name}}
                         </td>
                         <td>
                            {{$donor->gender}}
                         </td>
                         <td>
                            {{$donor->dob}}
                         </td>
                         <td>
                            {{$donor->email}}
                         </td>
                         <td>
                            {{$donor->last_donation_date}}
                         </td>
                         <td>
                             VOLUNTARY DONOR
                         </td>
                         <td>
                             @if ($donor->status == 1)
                             <span class="text-success">Active</span>
                             @else
                             <span class="text-danger">InActive</span>
                             @endif
                         </td>
                         </tr>
                         @endforeach
                         @else
                         <tr>
                             <td colspan="8">There are no inactive donors at this time. Please Try Again later.</td>
                         </tr>
                         @endif
                    </tbody>
                </table>

			<div>
		</div>


	</div>


		</div>
	</div>
</div>


@include('admin.include.admin_footer')

</body>
</html>
