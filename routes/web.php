<?php

use App\Events\MessageSent;
use App\Models\BaiViet;
use App\Models\BinhLuan;
use App\Models\HinhAnh;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    broadcast(new MessageSent(auth()->user() ?? User::find(1), $request->input('message'), $request->input('idBaiViet'), 'create',$binhLuan->id));
    return $request->input('message');
});



Route::patch('binhluan', function (Request $request) {
    $binhLuan = BinhLuan::find($request->input('comment_id'));
    $binhLuan->noidung =  $request->input('message');
    $binhLuan->save();



    broadcast(new MessageSent(auth()->user() ?? User::find(1), $request->input('message'), $request->input('idBaiViet'), 'update',$binhLuan->id));
    return $request->input('message');
});

Route::delete('binhluan', function (Request $request) {
    $binhLuan = BinhLuan::find($request->input('comment_id'));
    $binhLuan->destroy($request->input('comment_id'));
    broadcast(new MessageSent(auth()->user() ?? User::find(1), $request->input('message'), $request->input('idBaiViet'), 'delete',$request->input('comment_id')));
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
