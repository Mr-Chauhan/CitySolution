@extends('layouts.FrontHome')

@section('main_content')

<div class="breadcrumb">
    <h2>Places to See With In City and District</h2>
  </div> 
  @if($PhotoGalleries)
 
  <?php $i = 0;?>
        @foreach($PhotoGalleries as $PhotoGallery)
        <?php $i++;
        ?>
        @if($i % 2 != 0)
        <div class="container">
    <div class="col-md-4">
      <img src="<?php echo SITE_PATH . 'images/PhotoGallery/'.$PhotoGallery->varImage; ?>" alt="" class="img-responsive" />
    </div>
    <div class="col-md-8">
      <h2>{{$PhotoGallery->varTitle}}</h2>
      <p>{{$PhotoGallery->varMessage}}</p>
    </div>
  </div>
  <hr>
        @else
        <div class="container">
    <div class="col-md-8">
    <h2>{{$PhotoGallery->varTitle}}</h2>
      <p>{{$PhotoGallery->varMessage}}</p>
    </div>
    <div class="col-md-4">
    <img src="<?php echo SITE_PATH . 'images/PhotoGallery/'.$PhotoGallery->varImage; ?>" alt="" class="img-responsive" />

    </div>
  </div>
  <hr>
        @endif
        @endforeach
  @endif
    <!-- Paginations -->
    <div class="row">
                    <div class="col-md-6 col-md-offset-5">
                            {{$PhotoGalleries->render()}}
                    </div>
              </div>
              
@endsection