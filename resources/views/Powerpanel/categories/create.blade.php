@extends('includes.powerpanel/powerpanel')

@section('main_content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <body class="bg-gradient-primary">


        <!-- Outer Row -->
        <div class="row justify-content-center">

          <div class="col-md-12">
            <div class="row">
              <div class="col-lg-6">
                <div class="text-left">
                  <h1 class="h4 text-gray-900 mb-4">Add Role</h1>
                </div>

                {!! Form::open(['method'=>'POST','id'=>'frmcat','route'=>'complain-category.store','files'=>true])!!}
            <div class="form-group">
                {!!Form::label('varName','Complain Category:')!!}
                {!!Form::text('varName',null,['class'=>'form-control'])!!}
            </div>
   
<div class="from-group">
 {!!Form::submit('Create Category',['class'=>'btn btn-success'])!!}
</div>
                {!!Form::close()!!}

                @include('includes.form_error')

              </div>

              <div class="col-lg-6 d-none d-lg-block "></div>

            </div>

            <hr>


          </div>

        </div>

      </body>


    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->
<style>
  .error{
    font-size:1rem;
  }
  </style>
  <script>
    $(document).ready(function() {
      $("#frmcat").validate({
        rules: {
          name: {
            required: true
          },
         
        },
        messages: {
          name: "Please enter role",
         

        },
        errorplacement: {

        },
        highlight: function(element, errorClass, validClass) {
          $(element).parents(".row.options")
            .addClass("options-error")
            .removeClass("valid");
        },
        unhighlight: function(element, errorClass, validClass) {
          $(element).parents(".row.options")
            .addClass("valid")
            .removeClass("options-error");
        },
      });
    });
  </script>
  @endsection
