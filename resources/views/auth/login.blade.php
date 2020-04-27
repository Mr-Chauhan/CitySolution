@extends('layouts.FrontHome')

@section('main_content')
<div class="breadcrumb">
    <h2>Login</h2>
</div>
<!-- 
  <div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22864.11283411948!2d-73.96468908098944!3d40.630720240038435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbg!4v1540447494452" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
  </div> -->
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="recent">
            </div>
            <div id="sendmessage">Your message has been sent. Thank you!</div>
            <div id="errormessage"></div>
            <form action="{{ route('login') }}" method="post" role="form" name="frmlogin" id="frmlogin">
                @csrf

                <div class="form-group">
                    <label for="email">{{ __('E-Mail Address') }}</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="Your Email" />
                    <div class="validation"></div>
                </div>
                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="password" />
                    <div class="validation"></div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="text-left"><button type="submit" class="btn btn-primary btn-lg"> {{ __('Login') }}</button> @if (Route::has('password.request'))
                <a href="{{route('register')}}" class="btn btn-primary btn-lg"> {{__('Register')}}</a>
        
                <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif</div>
            </form>
        </div>
    </div>
</div>
<div class="clearfix">...</div>


@endsection

@section('script')
<script src="{{asset('front/js/login.js')}}"></script>

@endsection