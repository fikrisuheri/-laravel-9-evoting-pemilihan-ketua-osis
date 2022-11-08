<?php 
namespace App\Services;

use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Support\Str;

class PemilihService {

    protected $pemilih;

    public function __construct(User $pemilih)
    {
        $this->pemilih = new BaseRepository($pemilih);
    }

    public function store($data)
    {
        $data['token'] =  strtoupper(Str::random(6));
        $pemilih = $this->pemilih->store($data);
        $pemilih->assignRole('user');
        return $pemilih;
    }

}