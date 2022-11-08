@extends('layouts.backend.app')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h4 class="card-title">{{ __('field.jurusan_name') }}</h4>
        <div class="card-header-action">
            <a href="{{ route('backend.jurusan.create') }}" class="btn btn-primary">{{ __('button.add') }}</a>
        </div>
    </div>
    <div class="card-body">
       <div class="table-responsive">
        {!! $dataTable->table(['class' => 'table table-striped table-bordered']) !!}
       </div>
    </div>
</div>
@endsection
@push('js')
{!! $dataTable->scripts() !!}
@endpush