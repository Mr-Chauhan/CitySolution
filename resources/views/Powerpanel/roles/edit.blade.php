@extends('includes.powerpanel/powerpanel')

@section('main_content')

@if(Session::has('deleted_users'))
<p class="bg-danger">{{session('deleted_users')}}</p>
@endif
<h1>Powerpanel Roles</h1>
<div class="col-md-6">

    {!! Form::model($roles,['method'=>'PATCH','route'=>['role.update',$roles->id]])!!}
    {!!Form::hidden('id',$roles->id,['class'=>'form-control'])!!}

    <div class="form-group">
        {!!Form::label('varName','Name:')!!}
        {!!Form::text('varName',$roles->varName ? $roles->varName:'',['class'=>'form-control'])!!}
    </div>

    <div class="row">
        <div class="col-md-6">

            <div class="from-group">
                {!!Form::submit('Edit Role',['class'=>'btn btn-primary col-md-6'])!!}
            </div>
        </div>
        <div class="col-md-6">

            <div class="from-group">
                <a href="{{url()->previous()}}" class="btn btn-danger col-md-6">Cancel</a>
            </div>
        </div>
    </div>
    {!!Form::close()!!}

</div>


@stop
@section('footer')