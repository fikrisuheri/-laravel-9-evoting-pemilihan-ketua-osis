<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\PemilihDatatable;
use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\User;
use App\Repositories\BaseRepository;
use App\Services\PemilihService;
use Illuminate\Http\Request;

class PemilihController extends Controller
{
    protected $pemilih,$kelas;
    public function __construct(User $pemilih,Kelas $kelas)
    {
        $this->pemilih = new BaseRepository($pemilih);
        $this->kelas = new BaseRepository($kelas);
    }

    public function index(PemilihDatatable $datatable)
    {
        try {
            return $datatable->render('backend.pemilih.index');
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function create()
    {
        try {
            $data['kelas'] = $this->kelas->get();
            return view('backend.pemilih.create',compact('data'));
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function store(Request $request,PemilihService $pemilihService)
    {
        try {
            $pemilihService->store($request->all());
            return redirect()->route('backend.pemilih.index')->with('success',__('message.store'));
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function edit($id)
    {
        try {
            $data['kelas'] = $this->kelas->get();
            $data['pemilih'] = $this->pemilih->find($id);
            return view('backend.pemilih.edit',compact('data'));
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function update(Request $request,$id)
    {
        try {
            $this->pemilih->update($id,$request->all());
            return redirect()->route('backend.pemilih.index')->with('success',__('message.update'));
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function delete($id)
    {
        try {
            $this->pemilih->delete($id);
            return redirect()->route('backend.pemilih.index')->with('success',__('message.delete'));
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }
}
