<?php

namespace App\Http\Controllers\Backend;

use App\Models\Kandidat;
use App\Http\Controllers\Controller;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

class KandidatController extends Controller
{
    protected $kandidat;
    public function __construct(Kandidat $kandidat)
    {
        $this->kandidat = new BaseRepository($kandidat);
    }

    public function index()
    {
        try {
            $data['kandidat'] = $this->kandidat->get();
            return view('backend.kandidat.index',compact('data'));
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function create()
    {
        try {
            return view('backend.kandidat.create');
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function store(Request $request)
    {
        try {
            $data = $request->except('_token');
            $this->kandidat->store($data,true,['photo'],'kandidat');
            return redirect()->route('backend.kandidat.index')->with('success',__('message.store'));
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function edit($id)
    {
        try {
            $data['kandidat'] = $this->kandidat->find($id);
            return view('backend.kandidat.edit',compact('data'));
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function update(Request $request,$id)
    {
        try {
              $data = $request->except('_token');
            $this->kandidat->update($id,$request->all(),true,['photo'],'kandidat');
            return redirect()->route('backend.kandidat.index')->with('success',__('message.update'));
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function delete($id)
    {
        try {
            $this->jurusan->delete($id,true,['photo']);
            return redirect()->route('backend.jurusan.index')->with('success',__('message.delete'));
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }
}
