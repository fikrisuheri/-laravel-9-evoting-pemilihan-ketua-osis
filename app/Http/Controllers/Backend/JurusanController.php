<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\JurusanDatatable;
use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    protected $jurusan;
    public function __construct(Jurusan $jurusan)
    {
        $this->jurusan = new BaseRepository($jurusan);
    }

    public function index(JurusanDatatable $datatable)
    {
        try {
            return $datatable->render('backend.jurusan.index');
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function create()
    {
        try {
            return view('backend.jurusan.create');
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function store(Request $request)
    {
        try {
            $this->jurusan->store($request->all());
            return redirect()->route('backend.jurusan.index')->with('success',__('message.store'));
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function edit($id)
    {
        try {
            $data['jurusan'] = $this->jurusan->find($id);
            return view('backend.jurusan.edit',compact('data'));
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function update(Request $request,$id)
    {
        try {
            $this->jurusan->update($id,$request->all());
            return redirect()->route('backend.jurusan.index')->with('success',__('message.update'));
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function delete($id)
    {
        try {
            $this->jurusan->delete($id);
            return redirect()->route('backend.jurusan.index')->with('success',__('message.delete'));
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }
}
