<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\KelasDatatable;
use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    protected $kelas,$jurusan;
    public function __construct(Kelas $kelas,Jurusan $jurusan)
    {
        $this->kelas = new BaseRepository($kelas);
        $this->jurusan = new BaseRepository($jurusan);
    }

    public function index(KelasDatatable $datatable)
    {
        try {
            return $datatable->render('backend.kelas.index');
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function create()
    {
        try {
            $data['jurusan'] = $this->jurusan->get();
            return view('backend.kelas.create',compact('data'));
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function store(Request $request)
    {
        try {
            $this->kelas->store($request->all());
            return redirect()->route('backend.kelas.index')->with('success',__('message.store'));
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function edit($id)
    {
        try {
            $data['jurusan'] = $this->jurusan->get();
            $data['kelas'] = $this->kelas->find($id);
            return view('backend.kelas.edit',compact('data'));
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function update(Request $request,$id)
    {
        try {
            $this->kelas->update($id,$request->all());
            return redirect()->route('backend.kelas.index')->with('success',__('message.update'));
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function delete($id)
    {
        try {
            $this->kelas->delete($id);
            return redirect()->route('backend.kelas.index')->with('success',__('message.delete'));
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }
}
