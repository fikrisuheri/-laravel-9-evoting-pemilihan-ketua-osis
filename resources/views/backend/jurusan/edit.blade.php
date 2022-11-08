@extends('layouts.backend.app')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4 class="card-title"> {{ __('button.add') }} {{ __('field.jurusan') }}</h4>
            <div class="card-header-action">
                <a href="{{ route('backend.jurusan.index') }}}}" class="btn btn-secondary">{{ __('button.back') }}</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('backend.jurusan.update',$data['jurusan']) }}" method="post">
                @csrf
                <x-forms.input :label="__('field.jurusan_name')" name="name" id="name" isRequired="true" :value="$data['jurusan']['name']" />
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">{{ __('button.update') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
