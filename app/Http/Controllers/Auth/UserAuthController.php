<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    public function login(Request $request)
    {
        $cek = User::where(['email' => $request->email,'token' => $request->token])->first();
        if($cek){
            Auth::loginUsingId($cek->id, $remember = true);
        }
        return back()->with('error','Nis Dan Token Tidak Sesuai');
    }
}
