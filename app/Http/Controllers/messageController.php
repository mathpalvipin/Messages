<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Message;
use App\User;
class messageController extends Controller
{public function __construct()
{
    $this->middleware('auth');
}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { $messages= Message::with('userto')->with('userfrom')->where('user_id_to','=' ,auth::id())
                   ->orWhere('user_id_from','=',auth::id())
                   ->orderBy('created_at', 'DESC')->get()->unique('user_id_from');
    $id =auth::id();
        $users  = User:: where('id','!=', auth::id())->get();
     $data=[
      'messages'=>$messages,
      'users'=>$users,
     'id'=>$id];
           return view('home')->with('data',$data);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users  = User:: where('id','!=', auth::id())->get();
        
          //5  dd($users);
            # code...
        
    return view('create')->with('users', $users);
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {               
    $this->validate($request, [
        
        'message'=>'required'
]);
    $m =  new Message();
     $m->user_id_from= auth::id();
      $m->user_id_to=$request->input('to');
     
      $m->message=$request->input('message');
      $m->save(); 
      $to=$request->input('to');
      $chat=$request->input('chat');
      if($chat)
        return redirect('/home/'.$to);
    else
       return redirect()->to('/home')->with('sucess' ,' sucessfuly sent message');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     $m   = Message::with('userto')->with('userfrom')->
                   where([
                ['user_id_from', '=', auth::id()],
                ['user_id_to', '=', $id]
            ])->orWhere([  ['user_id_to', '=', auth::id()],
                ['user_id_from', '=', $id]
            ])->orderBy('created_at', 'ASC')->get();
    $data= [
        'messages'=>$m,
     'id'=>$id];
        return view('view')->with('data',$data);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
