@extends('template1')

@section('content')
<section class="vh-100" style="background-color: #f1c6cf;">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-5 justify-content-center border-0">
                <div class="card-body text-center display-7">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" autocomplete="off" class="text-center" style="max-width: 300px; margin: auto;">
                        @csrf

                        <div class="mb-3">
                            <input id="email" type="email" class="form-control mb-4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input id="password" type="password" class="form-control mb-4 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary btn-block mb-3" style="width: 100%; border-radius: 15px;"> <!-- Menghapus style untuk lebar tombol -->
                            {{ __('Login') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection