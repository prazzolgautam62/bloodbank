
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
			<h3 class="text-primary"><i class="fa fa-envelope"></i> Inbox </h3><hr>
            @if(count($messages)>0)
            @foreach($messages as $message)
            @if($message->read_status == 0)
            <li class="list-group-item active">
                                    <span>
                                        <b><i class="fa fa-envelope-square"> </i> From: {{$message->name}}, {{$message->email}}</b>
                                    </span>
                                    <span   class="pull-right">


                                        {{-- <a href="admin_mess_del.php"  class="btn btn-danger btn-xs">Delete</a> --}}
                                        <form method="POST" action="{{route('delete.message', $message->id)}}">
                                            @csrf
                                            <a href="{{ route('viewMessage',$message->id) }}" class="btn btn-primary  btn-xs">View</a>
                                            <input name="_method" type="hidden" value="POST">
                                            <button type="submit" class="btn btn-danger btn-xs show_confirm">Delete</button>


                                        </form>
                                    </span>

            </li>
            @else
            <li class="list-group-item">
                            <span>
                                <b><i class="fa fa-envelope-square"></i> From: {{$message->name}}, {{$message->email}} </b>
                            </span>
                            <span   class="pull-right">
                                <form method="POST" action="{{route('delete.message', $message->id)}}">
                                    @csrf
                                    <a href="{{ route('viewMessage',$message->id) }}" class="btn btn-primary  btn-xs">View</a>
                                    <input name="_method" type="hidden" value="POST">
                                    <button type="submit" class="btn btn-danger btn-xs show_confirm">Delete</button>


                                </form>
                            </span>
            </li>
            @endif
            @endforeach
		<br>
        @else
        <div class='alert alert-info mess'>No Messages</div>
        @endif
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script>
          $("document").ready(function() {
                    setTimeout(function() {
                        $("div.alert").remove();
                    }, 5000); // 5 secs

                });

        $('.show_confirm').click(function(e) {
       if(!confirm('Are you sure you want to delete this Message?')) {
           e.preventDefault();
       }
   });
    </script>

@include('admin.include.admin_footer')

	</body>
</html>
