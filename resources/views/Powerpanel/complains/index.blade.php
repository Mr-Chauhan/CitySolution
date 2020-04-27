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
              <h1 class="h4 text-gray-900 mb-4">Complains</h1>
              @include('powerpanel.flash_message') 
            </div>
            <div class="card-body">
            {!! Form::open(['method'=>'POST','route'=>'complains.deleteRecord','class'=>'form-inline','files'=>true])!!}
          <input type="hidden" name="checkBoxArray" id="checkBoxArray">
         
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                  <tr>
      <th><input type="checkbox" id="options"></th>
      <th>Title</th>
      <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Status</th>
        <th>Date/Time</th>
        <th>View Complain</th>

      </tr>
                  </thead>
                  <tbody>
                  @if($complains)
                  @foreach($complains as $complain)
        <?php
         if($complain->chrStatus == "P")
         {
             $status = "Pending";
         }
          else if($complain->chrStatus == "I")
         {
             $status = "In Progress";
         }
         else
         {
             $status = "Complete";
         }
        ?>
            <tr>
            <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$complain->id}}"></td>
            <td>{{$complain->varTitle}}</td>
               
            <td>{{$complain->varName}}</td>
                <td>{{$complain->varEmail}}</td>
                <td>{{$complain->varPhone}}</td>
                <td>{{$status}}</td>
                <td>{{$complain->created_at->diffForHumans()}}</td>
                <td align="center"><a href="{{route('complains.show',$complain->slug)}}"  class='btn btn-success'>View </a></td>

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


  

    <script src="
  https://code.jquery.com/jquery-3.3.1.js
    "></script>
    <script src="
    https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js
    "></script>
    <script src="
    https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js
    "></script>
    <script src="
    https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js
    "></script>
    <script src="
    https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js
    "></script>
    <script src="
    https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js
    "></script>
    <script src="
    https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js
    "></script>
<script>
  
  $(document).ready(function() {
    $('#dataTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );

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