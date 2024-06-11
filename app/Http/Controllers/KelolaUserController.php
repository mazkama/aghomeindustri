<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class KelolaUserController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('pages.kelolaUser.view', ['dataUser' => $data]);
    }

    public function create(){
        return view('pages.kelolaUser.create');
    }

    function store(Request $request){ 
        $message= [
            'required'=> ':Attribute tidak boleh kosong!',
            'unique' => ':Attribute sudah ada!',
            'numeric' => ':Attribute harus memakai angka!',
            'min' => ':Attribute minimal 6 karakter',
            'digits_between' => ':Attribute harus antara :min dan :max digit..',
        ];
        $this->validate($request, [
            'username'=>'required|unique:user',
            'password'=>'required|min:6',
            'nama'=>'required',
            'nohp'=> 'required|numeric',
            'alamat'=>'required',
            'role'=>'required',
        ],$message);

        $data = new User();
        $data->username = $request->username;
        $data->password = Hash::make($request->password);
        $data->nama = $request->nama;
        $data->nohp = $request->nohp;
        $data->alamat = $request->alamat;
        $data->role = $request->role;
        $data->save();

        return redirect('kelola-user')->with('success', 'Data berhasil ditambahkan!');
    }

    public function destroy($id_user)
    {
        $data = User::find($id_user); 
        
        $data->delete();
        return redirect('kelola-user')->with('success', 'Data berhasil dihapus!');
    }
}