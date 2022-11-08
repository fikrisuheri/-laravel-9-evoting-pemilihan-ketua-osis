@extends('layouts.backend.app')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4 class="card-title"> {{ __('button.add') }} {{ __('field.kelas') }}</h4>
            <div class="card-header-action">
                <a href="{{ route('backend.kelas.index') }}}}" class="btn btn-secondary">{{ __('button.back') }}</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('backend.pemilih.store') }}" method="post">
                @csrf
                <x-forms.select name="kelas_id" id="kelas_id" :label="__('field.kelas')" :isRequired="true">
                    @foreach ($data['kelas'] as $kelas)
                        <option value="{{ $kelas->id }}">{{ $kelas->name }}</option>
                    @endforeach
                </x-forms.select>
                <x-forms.input :label="__('field.voter_name')" name="name" id="name" isRequired="true" />
                <x-forms.input :label="__('field.voter_nis')" name="email" id="email" isRequired="true" />
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">{{ __('button.save') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
