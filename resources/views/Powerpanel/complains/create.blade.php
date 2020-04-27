@extends('layouts.admin')

@section('content')
<h1> create posts</h1>
@include('includes.tinyeditor')
{!! Form::open(['method'=>'POST','action'=>'AdminPostsController@store','files'=>true])!!}
<div class="form-group">
    {!!Form::label('title','Title:')!!}
    {!!Form::text('title',null,['class'=>'form-control'])!!}
</div>
<div class="form-group">
    {!!Form::label('category_id','Category:')!!}
    {!!Form::select('category_id',[''=>'choose category']+ $category,null,['class'=>'form-control'])!!}
</div>
<div class="form-group">
    {!!Form::label('photo_id','Photo:')!!}
    {!!Form::file('photo_id',null,['class'=>'form-control'])!!}
</div>
<div class="form-group">
    {!!Form::label('body','Description:')!!}
    {!!Form::textarea('body',null,['class'=>'form-control','row'=>3])!!}
</div>



<div class="from-group">
 {!!Form::submit('Create Post',['class'=>'btn btn-primary'])!!}
</div>
{!!Form::close()!!}

@include('includes.form_error')

@stop