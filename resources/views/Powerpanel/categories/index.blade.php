@extends('includes.powerpanel/powerpanel')

@section('main_content')

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
          <h1 class="h4 text-gray-900 mb-4">Complaint Department</h1>
          @include('powerpanel.flash_message')

          <hr>
          <a href="{{route('complain-category.create')}}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add Complaint Department</a>

        </div>
        <div class="card-body">
          {!! Form::open(['method'=>'POST','route'=>'complain-category.deleteRecord','class'=>'form-inline','files'=>true])!!}
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
                @if($categories)
                @foreach($categories as $category)
                <tr>
                  <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$category->id}}"></td>

                  <td><a href="{{route('complain-category.edit',$category->id)}}">{{$category->varName}}</a></td>
                  <td>{{$category->created_at->diffForHumans()}}</td>

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
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->
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