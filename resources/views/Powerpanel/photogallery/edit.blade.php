@extends('includes.powerpanel/powerpanel')

@section('main_content')

@if(Session::has('deleted_users'))
<p class="bg-danger">{{session('deleted_users')}}</p>
@endif
<h1>Edit Photo Gallery</h1>
<div class="col-md-6">

    {!! Form::model($roles,['method'=>'PATCH','route'=>['photogallery.update',$roles->id],'files'=>true])!!}
    {!!Form::hidden('id',$roles->id,['class'=>'form-control'])!!}

    <div class="form-group">
                  {!!Form::label('varTitle','Title')!!}
                  {!!Form::text('varTitle',null,['class'=>'form-control form-control-user'])!!}
				  </div>

				  <div class="form-group">
						{!!Form::label('varImage','File')!!}
						{!!Form::file('varImage',null,['class'=>'form-control','placeholder'=>'Phone'])!!}
					</div>
				<div class="form-group">
					{!!Form::label('varMessage','Description')!!}
					{!!Form::textarea('varMessage',null,['class'=>'form-control','maxlength'=>700, 'row'=>2])!!}
				</div>

    <div class="row">
        <div class="col-md-7">

            <div class="from-group">
                {!!Form::submit('Edit Photo Gallery',['class'=>'btn btn-primary col-md-7'])!!}
            </div>
        </div>
        <div class="col-md-5">

            <div class="from-group">
                <a href="{{url()->previous()}}" class="btn btn-danger col-md-5">Cancel</a>
            </div>
        </div>
    </div>
    {!!Form::close()!!}

</div>


@stop
@section('footer')