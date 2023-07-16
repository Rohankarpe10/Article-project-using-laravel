@extends('layout')
@section('content')
<div class="card">
  <div class="card-header">Add New Article</div>
  <div class="card-body">
      <form action="{{ url('member') }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <input type="text" name="links" id="links" class="form-control"></br>
        <label>Category</label></br>
        <input type="text" name="category" id="category" class="form-control"></br>
        <label>Description</label></br>
        <input type="text" name="description" id="description" class="form-control"></br>
        <input class="form-control" name="photo" type="file" id="photo"> </br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
  </div>
</div>
@stop
