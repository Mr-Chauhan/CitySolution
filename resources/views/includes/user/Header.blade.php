<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>City Solution</title>

    <!-- Bootstrap -->
    <link href="{{asset('front/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('front/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/jquery.bxslider.css')}}">
    <link href="{{asset('front/css/style.css')}}" rel="stylesheet">

    <script src="{{asset('front/js/jquery-2.1.1.min.js')}}"></script>
<script src="{{asset('front/js/jquery.validate.min.js')}}"></script>
    <!-- =======================================================
    Theme Name: MeFamily
    Theme URL: https://bootstrapmade.com/family-multipurpose-html-bootstrap-template-free/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->


</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><span>City Solution</span></a>
            </div>
            <div class="navbar-collapse collapse">
                <div class="menu">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="actives"><a  href="<?php echo SITE_PATH;?>">Home</a></li>
                        <li role="presentation"><a href="{{route('about-us')}}">About</a></li>
                        <li role="presentation"><a href="{{route('contact.index')}}">Contact</a></li>

                        @if(Auth::guest())
						<li role="presentation"><a href="{{route('login')}}">Login</a></li>
						@else

						<li role="presentation"><a href="{{route('complain.index')}}">Complains</a></li>
                                    <li>
									<a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
									</li>
						@endif
                    </ul>
                    
                </div>
            </div>
        </div>
    </nav>

