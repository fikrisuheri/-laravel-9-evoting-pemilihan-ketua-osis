@extends('layouts.backend.app')
@section('content')
    <div class="row">
        <div class="col-md-12 text-end">
            <a href="{{ route('backend.kandidat.create') }}" class="btn btn-primary">{{ __('button.add') }}</a>
        </div>
    </div>
    <div class="row">
        @foreach ($data['kandidat'] as $kandidat)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-content">
                        <img class="img-fluid w-100" src="{{ $kandidat->photo_path }}" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">{{ $kandidat->name }}</h4>
                        </div>
                    </div>
                    <div class="card-footer">
                        <x-button.dropdown>
                            <a href="{{ route('backend.kandidat.edit',$kandidat) }}" class="dropdown-item">
                                <i class="bi bi-pen"></i> {{ __('button.edit') }}
                            </a>
                            <a href={{ route('backend.kandidat.delete',$kandidat) }}"" class="dropdown-item">
                                <i class="bi bi-trash"></i> {{ __('button.delete') }}
                            </a>
                        </x-button.dropdown>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
