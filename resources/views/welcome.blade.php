@extends('layouts.FrontHome')

@section('main_content')


<div class="slider">
        <div class="img-responsive">
            <ul class="bxslider">
                <li><img src="{{asset('front/img/8.jpg')}}" alt="" /></li>
                <li><img src="{{asset('front/img/9.jpg')}}" alt="" /></li>
                <li><img src="{{asset('front/img/7.jpg')}}" alt="" /></li>
            </ul>
        </div>
    </div>  
@endsection