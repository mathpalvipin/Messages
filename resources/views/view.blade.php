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
                          <ul class="list-group">

                          <li class="list-group-item"><strong>  {{$message->userfrom->name}}</strong>  <br>
                            <p>{{$message->message}}</p></li> </ul>
                          @endforeach
                          @else
                          no message yet!
@endif
 <form  method="post" action="/home" >
  @csrf
  <input type="hidden" value="{{$data['id']}}" name="to">
  <input type="hidden" value="1" name="chat">
      <div class="form-group">

      <textarea type="text" class="form-control"  name="message" placeholder="Enter Message"  ></textarea>
      </div>
  <button type="submit" class="btn btn-primary" style="width: 100%;">Send</button>
</form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
