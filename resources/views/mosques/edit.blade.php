@extends('layouts.app')
@section('mosque','active')
@section('content')

<div class="container ">
  <div class="row mt-5">
    <div class="col-sm-8 offset-sm-2">
        <form  action="{{'/mosque/' . $mosque->id}}" method="post" role="form" enctype="multipart/form-data" class="form-container">
            @csrf
                @method('PUT')
        <div class="form-group">
          <label for="name">name:</label>
          <input type="text" name = "name" id = "name" class="form-control" value="{{$mosque->name}}">
        </div>
        <div class="form-group">
            <label for="brief_location_description">brief_location_description:</label>
            <input type="text" name = "brief_location_description" id = "brief_location_description" class="form-control" value="{{$mosque->brief_location_description}}">
          </div>
        <div class="form-group">
          <label for="full_location_description">full_location_description:</label>
          <input type="text" name = "full_location_description" id = "full_location_description" class="form-control" value="{{$mosque->full_location_description}}" >
        </div>
        <div class="form-group">
          <label for="lat">lat:</label>
          <input type="text" name = "lat" id = "lat" class="form-control" value="{{$mosque->lat}}" >
        </div>
        <div class="form-group">
          <label for="long">long:</label>
          <input type="text" name = "long" id = "long" class="form-control" value="{{$mosque->long}}" >
        </div>


        <button type = "submit" class = "btn btn-success">Submit</button>
      </form>
    </div>
  </div>
@endsection
