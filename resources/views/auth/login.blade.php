@extends('navbar') @section('content') <br /><br /><br />
<style>
    input {
        border: #000 solid 1px;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="pb-2">
                <div class="text-center pb-3">
                    <b>{{ __('To Continue Login to GG Afrika') }}</b>
                </div>

                @if($errors->any())
                <h4
                    class="invalid-feedback text-center alert alert-danger"
                    role="alert"
                >
                    {{$errors->first()}}
                </h4>
                @endif
                <div class="card-body px-2 pt-2">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group offset-md-3">
                            <small for="email" class="form-label"
                                ><b>{{ __('Email address') }}</b></small
                            >

                            <div class="" style="width: 390px">
                                <input
                                    id="email"
                                    type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    name="email"
                                    value="{{ old('email') }}"
                                    required
                                    autocomplete="email"
                                />

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group offset-md-3 ">
                            <small for="password" class="form-label"
                                ><b>{{ __('Password') }}</b></small
                            >

                            <div class="pb-2" style="width: 390px">
                                <input
                                    id="password"
                                    type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    name="password"
                                    required
                                    autocomplete="current-password"
                                />

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            @if (Route::has('password.request'))
                            <small class="">
                                <a
                                    class="active-link"
                                    href="{{ route('password.request') }}"
                                >
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </small>
                            @endif
                        </div>

                        <div class="row offset-md-3">
                            <div class="col">
                                <div
                                    class="form-check"
                                    style="margin-left: 10px"
                                >
                                    <input class="form-check-input"
                                    type="checkbox" name="remember"
                                    id="remember" {{ old('remember') ? 'checked'
                                    : '' }}>

                                    <label
                                        class="form-check-label"
                                        for="remember"
                                    >
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="" >
                                    <button
                                        type="submit"
                                        style="border-radius: 20px; height: 40px; color: #000; width: 100px;"
                                        class="btn btn-warning"
                                    >
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <hr />
    <div class="text-center">
        <small>
            <b>{{ __('Don\'t have an account?') }}</b>
        </small>
        <br />
        <br />
        <a
            style="
                margin-left: 30px;
                background: #ffffff;
                color: #000;
                border: #000 solid 1px;
                width: 300px;
                border-radius: 20px;
            "
            class="btn"
            href="{{ route('register') }}"
        >
            {{ __('Register for GG Afrika') }}
        </a>
    </div>
    <br /><br /><br />
    @endsection
</div>
