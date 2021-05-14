
  @if(session()->has('message'))
  <div class="alert alert-success">{{session()->get('message')}}</div>
@elseif(session()->has('error'))
  <div class="alert alert-danger">{{session()->get('error')}} </div>
@endif
<h3 class="text-primary"><a href="{{ route('home') }}"><i class="glyphicon glyphicon-dashboard"></i> Dashboard</a></h3>
<hr>

<ul class="nav nav-stacked">
	<li><a href="{{ url('/admin/inbox')}}"><i class="fa fa-envelope fa-lg"></i> Inbox </a></li>
	<li><a href="{{ route('admin.search.donor') }}"><i class="fa fa-search fa-lg"></i>Search Donors</a></li>
	<li><a href="{{ route('admin.active.donor') }}"><i class="fa fa-users fa-lg text-success"></i> Active Donors</a></li>
	<li><a href="{{ route('admin.inactive.donor') }}"><i class="fa fa-users fa-lg text-danger"></i> Not Active Donors</a></li>
	<li><a href="{{ route('admin.blood.requests') }}"><i class="fa fa-bed fa-lg"></i> Need Blood</a></li>
	<hr>
	<li><a href="#add" data-toggle="collapse" ><i class="fa fa-cogs fa-lg"></i> Settings</a></li>
	<ul class="nav collapse" id="add">
		<li><a href="{{ url('admin/country')}}"><i class="fa fa-plus fa-lg"></i> Add Country</a>
		<li><a href="{{ url('admin/state')}}"><i class="fa fa-plus fa-lg"></i> Add State</a></li>
		<li><a href="{{ url('admin/city')}}"><i class="fa fa-plus fa-lg"></i> Add City</a></li>
		<!-- <li><a href="admin_area.php"><i class="fa fa-plus fa-lg"></i> Add Area</a></li> -->
		</li>
	</ul>
</ul>

<hr>
