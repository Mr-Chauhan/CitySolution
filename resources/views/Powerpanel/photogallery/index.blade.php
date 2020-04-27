@extends('includes.powerpanel/powerpanel')
@section('main_content')

<body id="page-top">
  <div class="container-fluid">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h1 class="h4 text-gray-900 mb-4">Photo Gallery</h1>
        @include('powerpanel.flash_message') 
        <hr>
        <a href="{{route('photogallery.create')}}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add Photo Gallery</a>
      </div>
      <div class="card-body">
      {!! Form::open(['method'=>'POST','route'=>'photogallery.deleteRecord','class'=>'form-inline','files'=>true])!!}
          <input type="hidden" name="checkBoxArray" id="checkBoxArray">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
              <th><input type="checkbox" id="options"></th>

                <th>Categoy</th>
                <th>Date/Time</th>
              </tr>
            </thead>
            <tbody>
              @if($PhotoGalleries)
              @foreach($PhotoGalleries as $PhotoGallery)
              <tr>
                <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$PhotoGallery->id}}"></td>
              
                <td><a href="{{route('photogallery.edit',$PhotoGallery->id)}}">{{$PhotoGallery->varTitle}}</a></td>
                <td>{{$PhotoGallery->created_at->diffForHumans()}}</td>
              </tr>
              @endforeach
              @endif
            </tbody>
          </table>
        </div>
        <div class="py-3">
            {!!Form::submit('Delete',['class'=>'btn btn-danger'])!!}
            {!!Form::close()!!}
          </div>
      </div>
    </div>
  </div>
  </div>

  @endsection
  
  @section('scripts')

  <script>
    $(document).ready(function() {
      $('#options').click(function() {
        if (this.checked) {
          $('.checkBoxes').each(function() {

            this.checked = true;

          });
        } else {
          $('.checkBoxes').each(function() {

            this.checked = false;

          });

        }
      });

    });
  </script>
  @stop