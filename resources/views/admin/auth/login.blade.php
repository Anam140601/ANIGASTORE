@extends('admin.admin_layouts')

@section('admin_content')
    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

        <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">ANIGASTORE</div>
        <div class="tx-center mg-b-60">Admin Login Page</div>
        
        <form action="{{ route('admin.login') }}" method="post">
            @csrf
            <div class="form-group">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div><!-- form-group -->
            <div class="form-group">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <a href="{{ route('admin.password.request') }}" class="tx-danger tx-12 d-block mg-t-10">Forgot password?</a>
            </div><!-- form-group -->
            <button type="submit" class="btn btn-danger btn-block">Sign In</button>

            <div class="mg-t-60 tx-center">Not yet a member? <a href="page-signup.html" class="tx-danger">Sign Up</a></div>
            </div><!-- login-wrapper -->
        </form>
        
    </div><!-- d-flex -->
@endsection

@push('css')
<link href="{{ asset('public/panel/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
<link href="{{ asset('public/panel/lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('public/panel/css/starlight.css') }}">
@endpush

@push('js')
<script src="{{ asset('public/panel/lib/jquery/jquery.js') }}"></script>
<script src="{{ asset('public/panel/lib/popper.js/popper.js') }}"></script>
<script src="{{ asset('public/panel/lib/bootstrap/bootstrap.js') }}"></script>
@endpush