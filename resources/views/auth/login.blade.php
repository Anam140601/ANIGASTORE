@extends('layouts.app')

@section('content')
<div class="contact_form">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 offset-lg-1" style="border:1px solid grey; padding:20px; border-radius:25px;">
                <div class="contact_form_container">
                    <div class="contact_form_title text-center">Masuk</div>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label >Email atau No.HP</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus placeholder="Masukan Email Anda">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label >Kata Sandi</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="current-password" placeholder="Masukan Kata Sandi Anda">
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="contact_form_button">
                            <button type="submit" class="btn btn-info btn-block">Masuk</button>
                        </div>
                    </form>
                    <div class="mt-3 mb-3">Klik <a href="{{ route('password.request') }}">INI</a> jika anda lupa kata sandi</div>
                    <div class="sosmed">
                        <a href="{{ url('/auth/redirect/google') }}" class="btn btn-danger"><i class="fab fa-google" aria-hidden="true"></i> Masuk dengan Google</a>
                        <a href="{{ url('/auth/redirect/facebook') }}" class="btn btn-primary"><i class="fab fa-facebook" aria-hidden="true"></i> Masuk dengan Facebook</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1" style="border:1px solid grey; padding:20px; border-radius:25px;">
                <div class="contact_form_container">
                    <div class="contact_form_title text-center">Daftar</div>
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label >Nama Lengkap</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Masukan Nama Lengkap Anda">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label >No. HP</label>
                            <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required placeholder="Masukan No Hp Anda">
                            @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label >Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Masukan Email Anda">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label >Kata Sandi</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="current-password" placeholder="Masukan Kata Sandi Anda">
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label >Konfirmasi Kata Sandi</label>
                            <input type="password" class="form-control" placeholder="Masukan Kembali Kata Sandi Anda" name="password_confirmation" required>
                        </div>
                        <div class="contact_form_button">
                            <button type="submit" class="btn btn-info btn-block">Daftar</button>
                        </div>
                        <div class="sosmed mt-3">
                            <a href="{{ url('/auth/redirect/google') }}" class="btn btn-danger"><i class="fab fa-google" aria-hidden="true"></i> Daftar dengan Google</a>
                            <a href="{{ url('/auth/redirect/facebook') }}" class="btn btn-primary"><i class="fab fa-facebook" aria-hidden="true"></i> Daftar dengan Facebook</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="panel"></div>
</div>
@endsection
@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/contact_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/contact_responsive.css') }}">
@endpush
@push('js')
<script src="{{ asset('public/frontend/js/contact_custom.js') }}"></script>
@endpush
