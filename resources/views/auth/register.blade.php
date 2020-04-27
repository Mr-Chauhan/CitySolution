@extends('layouts.FrontHome')

@section('main_content')
<div class="breadcrumb">
    <h2>Register</h2>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="recent">
            </div>
            <div id="sendmessage">Your message has been sent. Thank you!</div>
            <div id="errormessage"></div>
            <form method="POST" name="frmregister" id="frmregister" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <label for="name" >{{ __('Name') }}</label>

                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="email" >{{ __('E-Mail Address') }}</label>

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="password" >{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="password-confirm" >{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="form-group">
                <div class="text-left">
                        <button type="submit" class="btn btn-primary  btn-lg">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="clearfix">...</div>


@endsection
@section('script')
<script src="{{asset('front/js/register.js')}}"></script>

@endsection