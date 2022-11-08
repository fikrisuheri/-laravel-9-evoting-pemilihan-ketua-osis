<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Kandidat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            $user = User::whereHas('roles',function($q){
                $q->where('name','user');
            });
            $data['pemilih'] = $user->count();
            $data['kandidat'] = Kandidat::count();
            
            return view('backend.dashboard',compact('data'));
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function ajax()
    {
         
        $data['pemilih_done'] = User::whereHas('roles',function($q){
            $q->where('name','user');
        })->whereNotNull('kandidat_id')->count();
        $data['pemilih_pending'] = User::whereHas('roles',function($q){
            $q->where('name','user');
        })->whereNull('kandidat_id')->count();
        $data['hasil'] = DB::table('users')
        ->select(DB::raw('COUNT(users.kandidat_id) as jumlah'),'kandidats.name')
        ->join('kandidats','kandidats.id','=','users.kandidat_id','RIGHT')
        ->groupBy('kandidats.id')
        ->get();
        return json_encode($data);
    }
}
