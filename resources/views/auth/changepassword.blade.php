@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Ubah Kata Sandi') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}" aria-label="{{ __('Reset Password') }}">
                        @csrf


                        <div class="form-group row">
                            <label for="oldpass" class="col-md-4 col-form-label text-md-right">{{ __('Kata Sandi Lama Anda') }}</label>

                            <div class="col-md-6">
                                <input id="oldpass" type="password" class="form-control{{ $errors->has('oldpass') ? ' is-invalid' : '' }}" name="oldpass" value="{{ $oldpass ?? old('oldpass') }}" required autofocus>

                                @if ($errors->has('oldpass'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('oldpass') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Kata Sandi Baru') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Konfirmasi Kata Sandi Baru') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Ubah Kata Sandi') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <img src="{{ asset(Auth::user()->avatar) }}" alt="" class="card-img-top" style="border-radius: 50%;height: 90px;width: 90px;margin-left: 37%">
                <div class="card-body">
                    <h5 class="card-title text-center">{{ Auth::user()->name }}</h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="{{ route('password.change') }}" style="color: black">Ubah Kata Sandi</a></li>
                    <li class="list-group-item">balalala</li>
                    <li class="list-group-item">balalala</li>
                </ul>
                <div class="card-body">
                    <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block"><i class="fas fa-power-off"></i> Keluar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
