@extends('layouts.user.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Hi, {{ auth()->user()->name }}
                    </h4>
                    <hr>
                </div>
                <div class="card-body">
                    @if (auth()->user()->kandidat_id == null)
                        @if (date('Y-m-d') == $vote_date)
                            @if (strtotime(date('H:i')) > strtotime($vote_open) && strtotime(date('H:i')) < strtotime($vote_closed))
                                 <p>Silahkan Klik Tombol Dibawah Ini Untuk Melaksanakan Pemilihan!.</p>
                                 <a href="{{ route('voting') }}" class="btn btn-primary">Voting Sekarang</a>
                            @else
                                <p>Pilkosis Telah Ditutup Pada Jam {{ $vote_closed }}.</p>
                                <p>Silahkan Buka Halaman Hasil Untuk Mengetahui Siapa Pasangan Yang Jadi Pemenangnya.</p>
                            @endif
                        @elseif(strtotime(date('Y-m-d')) < strtotime($vote_date))
                            <p>Pilkosis Akan Dilaksanakan Pada Tanggal {{ $vote_date }}</p>
                        @elseif(strtotime(date('Y-m-d')) > strtotime($vote_date))
                            <p>Pilkosis Telah Dilaksanakan Pada Tanggal {{ $vote_date }}</p>
                        @endif
                    @else
                        <p>Terimakasih, Kamu Telah Mengirimkan Suaramu!</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
