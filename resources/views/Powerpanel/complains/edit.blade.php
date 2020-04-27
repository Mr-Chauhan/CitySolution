@extends('layouts.admin')

@section('content')
<h1> Edit Posts</h1>
<div class="col-md-3">
    <img src="{{$posts->photo ? $posts->photo->file : 'sdjfhlsdkuhh'}}" alt=" " class="img-responsive im-rounded">
</div>
<div class="col-md-9">
        {!! Form::model($posts,['method'=>'PATCH','action'=>['AdminPostsController@update',$posts->id],'files'=>true])!!}
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
        {!!Form::submit('Edit Post',['class'=>'btn btn-primary col-md-6'])!!}
        </div>
        {!!Form::close()!!}

        <div class="form-group">
            {!! Form::open(['method'=>'DELETE','action'=>['AdminPostsController@destroy',$posts->id],'files'=>true])!!}
        
                <div class="from-group">
                    {!!Form::submit('Delete Post',['class'=>'btn btn-danger col-md-6'])!!}
                </div>
            {!!Form::close()!!}
        </div>
</div>

    @include('includes.form_error')
@stop