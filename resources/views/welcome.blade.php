@extends('layouts.frontend.app')
@section('content')
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-6 pt-md-5 mb-3 text-center text-md-start">
                <h1 class="text-uppercase">Selamat Datang Di PILKOSIS</h1>
                <h4>Mari Kita Sukseskan Pemilihan Ketua Osis <br> SMK Harapan Nusantara</h4>
                <a href="#" class="btn btn-outline-primary">Mulai Memilih</a>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('image/clip-voting.gif') }}" alt="" srcset="" class="w-100">
            </div>
        </div>
        <div class="row pt-5">
            <div class="col-md-12 text-center">
                <h2>Daftar Paslon</h2>
            </div>
            <div class="col-md-12">
                <div class="row">
                    @foreach ($data['kandidat'] as $kandidat)
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-content">
                                    <img class="img-fluid w-100" src="{{ $kandidat->photo_path }}" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">{{ $kandidat->name }}</h4>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-between">
                                    <button class="btn btn-primary btn-block"  data-bs-toggle="modal"
                                    data-bs-target="#default"
                                    data-visi="{{ $kandidat->visi }}"
                                    data-misi="{{ $kandidat->misi }}"
                                    >Lihat Visi & Misi</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>

    {{-- Modal --}}
    <!--Basic Modal -->
    <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">
                       Visi Misi
                    </h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <h6>Visi :</h6>
                    <p id="visi"></p>
                    <h6>Misi :</h6>
                    <p id="misi"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Accept</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
<script>
    $('#default').on('show.bs.modal', function(e) {
    var visi = $(e.relatedTarget).data('visi');
    var misi = $(e.relatedTarget).data('misi');
    $('#visi').text(visi);
    $('#misi').text(misi);
    });
</script>
@endpush