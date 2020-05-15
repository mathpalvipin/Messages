@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header "><h2 class="text-center" >INBOX</h2>
               
 
 <form  method="post" action="/home" >
 	@csrf
 	<div class="form-group">
 		 <label for="to"> To</label>
 		 <select class=" form-control" name="to">
 		 	@foreach( $users as $user )
 		 	<option value="{{ $user->id}} "> {{$user->name}}, {{$user->email}}</option>
 		 	@endforeach
 		 </select>
 	</div>
  <div class="form-group">
    <label for="subject">Subject</label>
    <textarea type="text" class="form-control"   placeholder="Enter subject"  name="subject" ></textarea>
      </div>
     <div class="form-group">
    <label for="body">Message</label>
      <textarea type="text" class="form-control"  name="message" placeholder="Enter Message"  ></textarea>
      </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

 
</div>
</div></div>
</div>

</div>
@endsection