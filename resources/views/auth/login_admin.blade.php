@extends('layouts.guest.app')
@section('content')
<div class="row h-100 justify-content-center">
    <div class="col-lg-6 col-12">
        <div id="auth-left">
            <div class="text-center mb-4">
                <a href="index.html"><img src="{{ $app_logo }}" alt="Logo" width="100"></a>
            </div>
            <h1 class="auth-title">Masuk</h1>
             
            <form method="POST" action="{{ route('login_admin_post') }}">
                @csrf
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-xl" placeholder="Email"
                        name="email">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control-xl" placeholder="Password"
                        name="password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <div class="form-check form-check-lg d-flex align-items-end">
                    <input class="form-check-input me-2" type="checkbox" name="remember" value="" id="flexCheckDefault">
                    <label class="form-check-label text-gray-600" for="flexCheckDefault">
                        Ingat saya
                    </label>
                </div>
                <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
            </form>
        </div>
    </div>
    
</div>
@endsection