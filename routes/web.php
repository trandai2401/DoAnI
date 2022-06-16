<?php

use App\Events\ChatEvent;
use App\Events\MessageSent;
use App\Models\BaiViet;
use App\Models\BinhLuan;
use App\Models\HinhAnh;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('baiviet/{id}', function ($id) {
    $baiViet = BaiViet::find($id);


    // $hinhAnh = HinhAnh::all();
    // return $hinhAnh;

    return view('baiviet', ['baiViet' => $baiViet, 'idBaiViet' => $id]);
});


Route::post('binhluan', function (Request $request) {

    $binhLuan = new BinhLuan();
    $binhLuan->noidung =  $request->message;
    $binhLuan->user_id = auth()->user()->id;
    $binhLuan->baiviet_id = $request->input('idBaiViet');
    $binhLuan->save();

    broadcast(new MessageSent(auth()->user() ?? User::find(1), $binhLuan, $request->input('idBaiViet'), 'create', $binhLuan->id));
    return $request->input('message');
});



Route::patch('binhluan', function (Request $request) {
    $binhLuan = BinhLuan::find($request->input('comment_id'));
    $binhLuan->noidung =  $request->input('message');
    $binhLuan->save();



    broadcast(new MessageSent(auth()->user() ?? User::find(1), $binhLuan, $request->input('idBaiViet'), 'update', $binhLuan->id));
    return $request->input('message');
});

Route::delete('binhluan', function (Request $request) {
    $binhLuan = BinhLuan::find($request->input('comment_id'));
    $binhLuan->destroy($request->input('comment_id'));
    broadcast(new MessageSent(auth()->user() ?? User::find(1), $request->input('message'), $request->input('idBaiViet'), 'delete', $request->input('comment_id')));
    return $request->input('message');
});



Route::get('login/{id}', function ($id) {
    Auth::loginUsingId($id);

    return back();
});

Route::get('logout', function () {
    Auth::logout();

    return back();
});


Route::get('chat', function () {
    $user_id  = Auth::user()->id;
    $db = DB::table('messages')->where('person_send_id',  $user_id)
        ->select('person_received_id', 'users.name', 'avt')->groupBy('person_received_id')
        ->join('users', 'messages.person_received_id', '=', 'users.id')->get();
    // ->join('users', 'messages.person_received_id', '=', 'users.id')

    // return $db;
    return view('chat', ['person_received' => $db]);
});

Route::post('messages', function (Request $request) {
    $personal_id  = Auth::user()->id;
    $user_id = $request->input('user_id');
    $db = DB::select(
        'select * FROM messages WHERE (person_send_id = ? AND person_received_id = ?) OR (person_send_id = ? AND person_received_id = ?) order by id  desc  LIMIT 10 ',
        [$personal_id,$user_id,$user_id,$personal_id]
    );

    $temp =  array();
    
    foreach($db as $mess){
        array_unshift($temp,$mess);
    }
    return $temp;
});
Route::post('message', function (Request $request) {
    $personal_id  = Auth::user()->id;
    $user_id = $request->input('user_id');
    $mess = new Message();
    $mess->noidung = $request->input('message');
    $mess->person_send_id = $personal_id;
    $mess->person_received_id = $user_id;
    $mess->save();

    broadcast(new ChatEvent($mess,'create',$personal_id));
    broadcast(new ChatEvent($mess,'create',$user_id));
});