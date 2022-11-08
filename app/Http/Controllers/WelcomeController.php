<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        try {
            $data['kandidat'] = Kandidat::all();
            return view('welcome',compact('data'));
        } catch (\Throwable $th) {
            return view('error.index', ['message' => $th->getMessage()]);
        }
    }
}
