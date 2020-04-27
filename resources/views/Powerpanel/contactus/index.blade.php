@extends('includes.powerpanel/powerpanel')

@section('main_content')

@if(Session::has('deleted_users'))
<p class="bg-danger">{{session('deleted_users')}}</p>
@endif

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
          <h1 class="h4 text-gray-900 mb-4">Contact Us</h1>
          @include('powerpanel.flash_message')

        </div>
        <div class="card-body">
          {!! Form::open(['method'=>'POST','route'=>'contactus.deleteRecord','class'=>'form-inline','files'=>true])!!}
          <input type="hidden" name="checkBoxArray" id="checkBoxArray">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <?php /*    <th><input type="checkbox" id="options"></th>*/ ?>
                  <th><input type="checkbox" id="options"></th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Message</th>
                  <th>Date/Time</th>
                </tr>
              </thead>
              <tbody>
                @if($contactus)

                @foreach($contactus as $contact)
                <tr>
                  <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$contact->id}}"></td>
                  <td>{{$contact->varFname." ".$contact->varLname}}</td>
                  <td>{{$contact->varEmail}}</td>
                  <td>{{$contact->varPhone}}</td>
                  <td>{{str_limit($contact->varMessage,30)}}</td>
                  <td>{{$contact->created_at->diffForHumans()}}</td>
                </tr>
                @endforeach


                @endif

                <?php /*{!!Form::close()!!}*/ ?>
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