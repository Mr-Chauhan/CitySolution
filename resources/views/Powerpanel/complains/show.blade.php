@extends('includes.powerpanel/powerpanel')

@section('main_content')
<?php

// dd($ShowComplain);  
?>
<h2>Complain Details</h2>
<br>
<div class="col-md-6">

    {!! Form::model($ShowComplain,['method'=>'PATCH','route'=>['complains.update',$ShowComplain->id]])!!}
    {!!Form::hidden('id',$ShowComplain->id,['class'=>'form-control'])!!}
    <div class="form-group">
        {!!Form::label('varTitle','Complain Title')!!}
        {!!Form::text('varTitle',null,['class'=>'form-control form-control-user'])!!}
    </div>
    <div class="form-group">
        {!!Form::label('varMessage','Complain Description')!!}
        {!!Form::textarea('varMessage',null,['class'=>'form-control','maxlength'=>500, 'row'=>2])!!}
    </div>
    <div class="form-group">
        <img src="<?php echo SITE_PATH . 'images/complains/' . $ShowComplain->varImage; ?>" height="auto" width="500" alt="<?php echo SITE_PATH . 'images/no_image.jpg'; ?>">
    </div>
    <div class="form-group">
        {!!Form::label('chrStatus','Status:')!!}
        {!!Form::select('chrStatus',['P'=>'Pending','I'=>'In Progress','C'=>'Complete'],null,['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
        {!!Form::label('varAdminCmt','Admin Comment')!!}
        {!!Form::textarea('varAdminCmt',null,['class'=>'form-control','maxlength'=>500, 'row'=>2])!!}
        <div class="validation"></div>
    </div>

       
    <div class="row">
    <div class="col-md-6">
    <div class="from-group">
        {!!Form::submit('Edit Complain Details',['class'=>'btn btn-primary col-md-9'])!!}
    </div>

    </div>
    <div class="col-md-6">
    <a href="{{url()->previous()}}" class="btn btn-danger col-md-6">Cancel</a>
        
    </div>
    </div>
    {!!Form::close()!!}

</div>


@stop
@section('footer')