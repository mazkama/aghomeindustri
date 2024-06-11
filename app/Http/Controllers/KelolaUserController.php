<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class KelolaUserController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('pages.kelolaUser.view', ['dataUser' => $data]);
    }
}
