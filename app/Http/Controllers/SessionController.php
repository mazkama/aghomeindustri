<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller
{
    function loginclass()
    {
        return view('login');
    }

    function login(Request $request)
    {
        Session::flash('username', $request->username);
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username Wajib Diisi!',
            'password.required' => 'Password Wajib Diisi!'
        ]);

        # Menyimpan Data Username Serta Password
        $infologin = [
            'username' => $request->username,
            'password' => $request->password
        ];

        $remember = $request->has('remember');

        if (Auth::attempt($infologin, $remember)) {
            $user = Auth::user();
    
            // Periksa peran pengguna
            if ($user->role === 'Customer') {
                $successMessage = 'Anda berhasil masuk sebagai <br>' . Auth::user()->nama;
                return redirect('beranda')->with('success', $successMessage);
            } elseif($user->role === 'Admin'){
                $successMessage = 'Anda berhasil masuk sebagai <br>' . Auth::user()->nama;
                return redirect('kelola-produk')->with('success', $successMessage);
            } elseif($user->role === 'Gudang'){
                $successMessage = 'Anda berhasil masuk sebagai <br>' . Auth::user()->nama;
                return redirect('kelola-produk')->with('success', $successMessage);
            }else {
                // Jika peran tidak sesuai (misalnya Admin), logout dan kembalikan ke halaman login
                Auth::logout();
                return redirect('login')->with('error', 'Username atau Password Salah!');
            }
        } else {
            return redirect('login')->with('error', 'Username atau Password Salah!');
        }
    }

    function logout(){
        Auth::logout();
        return redirect('login');
    }

    function register(){
        return view('register');
    }

    function create(Request $request){
        Session::flash('username', $request->username);
        Session::flash('nama', $request->nama);
        Session::flash('nohp', $request->nohp);
        
        $request->validate([
            'username' => 'required|unique:user',
            'password' => 'required|min:6',
            'nama' => 'required',
            'nohp' => 'required|numeric|unique:user',
            'alamat' => 'required'
        ], [
            'username.required' => 'Username Wajib Diisi!',
            'username.unique' => 'Username Sudah Digunakan!',
            'nama.required' => 'Nama Wajib Diisi!',
            'nohp.required' => 'Nomor HP Wajib Diisi!',
            'nohp.numeric' => 'Isikan Email Dengan Benar!',
            'nohp.unique' => 'Nomor HP ini Sudah Digunakan!',
            'password.required' => 'Password Wajib Diisi!',
            'password.min' => 'Password Minimal 6 Karakter',
            //'password.confirmed' => 'Konfirmasi Password Tidak Cocok',
            'alamat.required' => 'Alamat Wajib Diisi!'
        ]);

        $data = [
            'username'=>$request->username,
            'password'=>$request->password,
            'nama' => $request->nama,
            'nohp'=>$request->nohp,
            'alamat'=>$request->alamat,
            'role' => $request->role ?? 'Customer'
        ];
        #Memasukkan Data
        User::create($data);

        # Menyimpan Data NIM Serta Password
        $infologin = [
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ];

        if (Auth::attempt($infologin)) {
            return redirect('dashboard')->with('Berhasil Login!', Auth::user()->nama);
        } else {
            return redirect('login')->withErrors('Username atau Password Salah!');
        }
    }
}
