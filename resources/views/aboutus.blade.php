@extends('layouts.FrontHome')

@section('main_content')
<style>
 a:hover {
  color: #24325D;
}
</style>


<div class="breadcrumb">
    <h2>About us</h2>
  </div> 
<div class="clearfix">...</div>

<div class="clearfix">...</div>

  <div class="ourstory">
    <div class="container">

<ol>
  <li><h4><a href="{{route('history.bvn')}}" title="History of Bhavnagar" >History of Bhavnagar</a></h4></li>
  <li><h4><a href="{{route('PlaceToSee')}}" title="Places to See With In City and District" >Places to See With In City and District</a></h4></li>
</ol> 

<br><br>    <div class="map">
  <div style="width: 100%"><iframe width="100%" height="600" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=bhavnagar%2Cgujarat+(My%20Business%20Name)&amp;ie=UTF8&amp;t=&amp;z=7&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/draw-radius-circle-map/">Radius map tool</a></iframe></div><br />
  </div>
    </div>
    
  </div>
<div class="clearfix">...</div>

<div class="clearfix">...</div>

                      
@endsection