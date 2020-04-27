@extends('layouts.FrontHome')

@section('main_content')
<div class="breadcrumb">
  </div>

<div class="events">
    @foreach($Complains as $Complain)
 <div class="container">
      <div class="col-md-4">
        <div class="slider">
          <div class="img-responsive">
            <ul class="bxslider" >
              @if( $Complain->varImage != '')
              <li>  <img src="<?php echo SITE_PATH . 'images/complains/' . $Complain->varImage; ?>" height="auto" width="500" alt="<?php echo SITE_PATH . 'images/no_image.jpg'; ?>"></li>

              @else
              <li>  <img src="<?php echo SITE_PATH . 'images/no_image.jpg'; ?>" height="250" width="250" alt="<?php echo SITE_PATH . 'images/no_image.jpg'; ?>"></li>

              @endif
            </ul>
          </div>
        </div>
      </div>
      
      <?php 
                if($Complain->chrStatus == "P")
                {
                    $status = "Pending";
                    $color = "red";
                }
                 else if($Complain->chrStatus == "I")
                {
                    $status = "In Progress";
                    $color = "brown";
                }
                else
                {
                    $status = "Complete";
                    $color = "green";
                }
          ?>  
      <div class="col-md-8">
        <h2>{{  $Complain->varTitle }}</h2> {{ \Carbon\Carbon::parse($Complain->created_at)->diffForHumans() }}
      
        <p><label for="">Complain Description: </label> {{  str_limit($Complain->varMessage,300) }}      </p>
       
          <label >Complain Status: </label>
        <label  style="color:<?php echo $color;?>">{{ $status }}      </label>
       @if(strlen($Complain->varMessage) > 300)
        <br>
        <a class="btn btn-primary" href="complain/{{$Complain->slug}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
        @endif
      </div>
    </div>
    @endforeach
    @if($count > 10)

      <!-- Paginations -->
      <div class="row">
                    <div class="col-md-6 col-md-offset-5">
                            {{$Complains->render()}}
                    </div>
              </div>
        @endif
</div> 
<div class="clearfix">...</div>

@endsection