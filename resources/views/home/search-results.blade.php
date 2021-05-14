<!DOCTYPE html>
<html lang="en">
<head>
    @include('include.header')
</head>
<body>


    @include('include.navbar')
    <!-- Page Content -->
    <div class="container"  style='margin-top:70px' >
        <div class="row">

            <div class="col-sm-9" >
                <h3 class="text-success"><i class="fa fa-users"></i> DONOR SEARCH RESULTS </h3><hr>
            <div class="row">

            <div class='col-md-12'>
                <ol class="breadcrumb">
                    <li >              <a href="{{ url('donor-registration') }}" style='text-decoration:none;'><i class='fa fa-users'></i> Donor Registration</a></li>
                    <li >              <a href="{{ url('request-blood') }}" style='text-decoration:none;'><i class='fa fa-bed'></i> Need Blood </a></li>
                    <li class="active"><a href="{{ url('search-donor') }}" style='text-decoration:none;'><i class='fa fa-search'></i> Search Blood</a></li>
                </ol>
            </div>
        </div>



		  		<div class="row ">
		    <div class=" col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center" style="padding:5px;font-size:16px;font-weight:bold"><span class="fa fa-search "> </span>  DONOR SEARCH RESULTS</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive"></div>
                        <table class="table table-striped">
                            <thead>

                                <tr>
                                   <th> DONOR ID
                                </th>
                                <th>
                                    DONOR NAME
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
                                    CONTACT NO.
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
                                    {{$donor->gender}}
                                 </td>
                                 <td>
                                    {{$donor->dob}}
                                 </td>
                                 <td>
                                    {{$donor->email}}
                                 </td>
                                 <td>
                                    {{$donor->contact_1}}, {{$donor->contact_2}}
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
                    </div>
                </div>
            </div>


                  </div>

            </div>

           </div>


 @include('include.footer')



</body>
</html>
