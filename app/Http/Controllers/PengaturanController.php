<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    //Profile
    public function showadmin(){
        $user = Auth::user();

        return view('pages.pengaturan', ['user' => $user]);
    }

    public function showgudang(){
        $user = Auth::user();

        return view('pages.pengaturan', ['user' => $user]);
    }

    //Update Profile
    public function updateProfile(Request $request){
        
        $message= [
                'required'=> ':Attribute tidak boleh kosong!',
                'numeric' => ':Attribute harus memakai angka!',
            ];
        // Validasi data yang diterima dari formulir
        $this ->validate($request, [
                'nama' => 'required',
                'alamat' => 'required',
                'nohp' => 'required|numeric',
        ],$message);
                
        // Ambil user yang sedang terautentikasi
        $user = Auth::user();
        $user-> nama = $request-> nama;
        $user-> alamat = $request-> alamat;
        $user-> nohp = $request-> nohp;

        $user-> update();
    
    // Redirect ke halaman profil dengan pesan sukses
        return view('pages.pengaturan')->with('editprofileSuccess', 'Profil berhasil diperbarui.');
    }

    public function updatePassword(Request $request){
        $user = Auth::user();

        $message= [
            'old_password.required' => 'Password lama harus diisi!',
            'new_password.required' => 'Password baru harus diisi!',
            'new_password.min' => 'Password baru harus terdiri dari minimal 6 karakter',
            'new_password.confirmed' => 'Konfirmasi password tidak cocok!',
            'confirm_password.required' => 'Konfirmasi password harus diisi!',
            'same' => 'Password tidak sama!',
        ];

        // Validasi input
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required|min:6|same:confirm_password',
            'confirm_password' => 'required',
        ], $message);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Cek apakah password lama cocok
        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Password lama tidak sesuai'])->withInput();
        }

        // Update password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return view('pages.pengaturan')->with('editpasswordSuccess', 'Password berhasil diubah.');
    }
}