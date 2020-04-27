@extends('layouts.FrontHome')

@section('main_content')

<div class="breadcrumb">
  <h2>Complain</h2>
</div>
<div class="container">
  <div class="row">
    <div class="col-lg-6">
      <div class="recent">
        <h3>Register your complain</h3>
      </div>
      <div id="sendmessage">Your message has been sent. Thank you!</div>
      <div id="errormessage"></div>
      {!! Form::open(['method'=>'POST','name'=>'frmcomplain','id'=>'frmcomplain','route'=>'complain.store','files'=>true,'autocomplete'=>'off'])!!}
      <div class="form-group">
        {!!Form::label('varName','Name *')!!}
        {!!Form::text('varName',Auth::user()->name,['class'=>'form-control','placeholder'=>'Name'])!!}
        <div class="validation"></div>
      </div>
      <div class="form-group">
        {!!Form::label('varEmail','Email *')!!}
        {!!Form::email('varEmail',Auth::user()->email,['class'=>'form-control','placeholder'=>'Email'])!!}
        <div class="validation"></div>
      </div>
      <div class="form-group">
        {!!Form::label('varTitle','Complain Title *')!!}
        {!!Form::text('varTitle',null,['class'=>'form-control','placeholder'=>'Complain Title'])!!}
        <div class="validation"></div>
      </div>
      <div class="form-group">
                  {!!Form::label('fkCateId','Complain Department')!!}
                  {!!Form::select('fkCateId',[''=>'Choose complain department']+$com_cat,null,['class'=>'form-control form-control-user'])!!}
                </div>
      <div class="form-group">
        {!!Form::label('file','File *')!!}
        {!!Form::file('file',null,['class'=>'form-control','placeholder'=>'Phone'])!!}
        <div class="validation"></div>
      </div>
      <div class="form-group">
        {!!Form::label('varMessage','Complain Description *')!!}
        {!!Form::textarea('varMessage',null,['class'=>'form-control','maxlength'=>500, 'row'=>2])!!}
        <div class="validation"></div>
      </div>

      {!!Form::submit('Submit',['class'=>'btn btn-primary btn-lg'])!!}

      {!!Form::close()!!}

    </div>
  </div>
  </div>
  <div class="clearfix">...</div>
  @endsection
  @section('script')
  <script src="{{asset('front/js/complain.js')}}"></script>

  @endsection