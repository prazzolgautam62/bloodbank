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
			<h3><i class="fa fa-envelope"></i> Message <form method="POST" action="{{route('delete.message', $message->id)}}">
                        @csrf
                        <input name="_method" type="hidden" value="POST">
                        <button type="submit" class=" btn-sm pull-right btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete Message</button>

                    </form>
                  </h3>
                  <hr>

					<h4>{{$message->name}}
                        <small>{{$message->email}}</small>
                    </h4>
						<p>{{$message->message}}</p>
                        <b>{{$message->contact_no}}</b>
						<p class='text-info pull-right'>Message Received at: {{$message->created_at}}</p>


		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script>
  $('.show_confirm').click(function(e) {
       if(!confirm('Are you sure you want to delete this Message?')) {
           e.preventDefault();
       }
   });
</script>

@include('admin.include.admin_footer')

	</body>
</html>
