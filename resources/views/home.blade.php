@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><h2>INBOX</h2>


                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                          
                          @if(count($data['messages'])>0)
                          @foreach ($data['messages'] as $message)
                          @if($message->user_id_from==$data['id'])
                          <ul class="list-group">
                           
                        <a href="/home/{{$message->userto->id}}" style="text-decoration: none !important; color: black;"> <li class="list-group-item"  ><strong> TO: {{$message->userto->name}},{{$message->userto->email }}</strong> <br>
                            <p>{{$message->message}}</p></li> </a>
                            @else
                             <a href="/home/{{$message->userfrom->id}}" style="text-decoration: none !important; color: black;"> 
                          <li class="list-group-item"><strong> From: {{$message->userfrom->name}},{{$message->userfrom->email }}</strong> <br>
                            <p>{{$message->message}}</p></li></a>
@endif
                          @endforeach
                          @else
                          no message yet!
@endif
 <form  method="post" action="/home" >
    @csrf
  
    <div class="form-group"> <input type="hidden" value="0" name="chat">
         <label for="to"> To</label>
         <select class=" form-control" name="to">
            @foreach( $data['users'] as $user )
            <option value="{{ $user->id}} "> {{$user->name}}, {{$user->email}}</option>
            @endforeach
         </select>
    </div>
      <div class="form-group" s>
    <label for="body">Message</label>
      <textarea type="text" class="form-control"  name="message" placeholder="Enter Message"  ></textarea>
      </div>
     
     
  <button type="submit" class="btn btn-primary"  style="width: 100%;">Send</button>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
