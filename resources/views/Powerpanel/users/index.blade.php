
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
              <h1 class="h4 text-gray-900 mb-4">Users</h1>
        @include('powerpanel.flash_message') 
              <hr>
              <a href="{{route('users.create')}}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add User</a>
            </div>
            <div class="card-body">
            {!! Form::open(['method'=>'POST','route'=>'users.deleteRecord','class'=>'form-inline','files'=>true])!!}
          <input type="hidden" name="checkBoxArray" id="checkBoxArray">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <th><input type="checkbox" id="options"></th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Personal Email</th>
                      <th>Role</th>
                      <th>status</th>
                      <th>Data/Time</th>
                      <th>Edit</th>
                    </tr>
                  </thead>
                  <tbody>
                  @if($users)
                      @foreach($users as $user)
                      <tr>
                      <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$user->id}}"></td>
                      <td>{{$user->varName}}</td>
                      <td>{{$user->varEmail}}</td>
                      <td>{{$user->varPersonalEmail}}</td>
                      <td>{{$user->role->varName}}</td>
                      <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
                      <td>{{$user->created_at->diffForHumans()}}</td>
                      <td><a href="{{route('users.edit',$user->id)}}" class='btn btn-success'>Edit</a></td>

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