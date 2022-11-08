<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    protected $web;
    public function __construct(Config $web)
    {
        $this->web = new BaseRepository($web);
    }

    public function index()
    {
        try {
            $data['model'] = $this->web->get();
            return view('backend.config.index', compact('data'));
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function store()
    {
        # code...
    }

    public function update(Request $request)
    {
        try {
            $input = $request->all();
            foreach ($input['field'] as $key => $value) {
                if ($request->file('field.' . $key)) {
                    $cek = $this->web->find($key);
                    if ($cek[$key] != null) {
                        File::delete('storage/' . $cek['value']);
                    }
                    $value = $request->file('field.' . $key)->store('config/web', 'public');
                    $this->web->Query()->find($key)->update(
                        [
                            'value' => $value
                        ]
                    );
                }
                $this->web->Query()->find($key)->update(
                    [
                        'value' => $value
                    ]
                );
            }
            return back()->with('success', __('message.update'));
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
