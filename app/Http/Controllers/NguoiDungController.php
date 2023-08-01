<?php

namespace App\Http\Controllers;

use App\Models\nguoidung;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class NguoiDungController extends Controller
{
    //


    // public function profile(){
    //     $nd = Auth::user();
    //     return view('admin.profile.index',['nguoidung'=>$nd]);
    // }

    // public function detail($id){
    //     $nd = User::find($id);

    //     return view('admin.nguoidung.detail',compact('nd'));
    // }

    // public function updateprofile(Request $request, $id)
    // {
    //     $nd = User::find($id);

    //     $filename = '';
    //     if($request -> hasFile('Anh')){
    //         $rq = $request -> file('Anh');
    //         $nameimg = $rq->getClientOriginalName();
    //         $filename = '/access/img/user/' .$nameimg;
    //         $request -> Anh->move(public_path('/access/img/user/'),$filename);
    //         User::where('id', $id)->update(
    //             [
    //                 "name" => $nd['name'],
    //             "Address" => $nd['Address'],
    //             "Phone" => $nd['Phone'],
    //             "email" => $nd['email'],
    //             "Anh"=>$filename,
    //             "password" => $nd['password'],

    //             "TrangThai"=>intval($nd->TrangThai)
    //             ]
    //         );
    //     }
    //     else{
    //         User::where('id', $id)->update(
    //             [
    //                 "name" => $request -> HoTen,
    //             "Address" => $request -> DiaChi,
    //             "Anh" => $nd["Anh"],
    //             "Phone" => $request -> DienThoai,
    //             "email" => $request -> Email,
    //             "password" => bcrypt($request->PassWord),

    //             "TrangThai"=>intval($request->TrangThai)
    //             ]
    //         );
    //     }

    //     return redirect()->route('nguoidung.profile');
    // }
    public function viewlogin(){
        return view('admin.login.index');
    }

    public function login(Request $request ){
        $this -> validate($request,[
            // 'email' => 'required|email:filter',
            'email' => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Đăng nhập thành công
            return redirect()->route('broad');
        } else {
            // Đăng nhập thất bại
            return back()->withErrors([
                'email' => 'Email hoặc mật khẩu không chính xác.'

            ]);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('nguoidung.viewlogin');
    }
}
