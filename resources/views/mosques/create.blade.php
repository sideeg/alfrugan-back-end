@extends('layouts.app')
@section('mosque','active')
@section('content')

<div class="container ">
  <div class="row mt-5">
    <div class="col-sm-8 offset-sm-2">
      <form action="{{route('mosque.store')}}" method = "post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <strong>:اسم المسجد</strong>
          <input type="text" name = "name" id = "name" class="form-control" >
        </div>
        <div class="form-group">
            <strong>:وصف مختصر لموقع المسجد</strong>
            <input type="text" name = "brief_location_description" id = "brief_location_description" class="form-control" >
          </div>
        <div class="form-group">
          <strong>:وصف كامل لموقع المسجد</strong>
          <input type="text" name = "full_location_description" id = "full_location_description" class="form-control" >
        </div>
        <div class="form-group">
          <strong>lat:</strong>
          <input type="text" name = "lat" id = "lat" class="form-control" >
        </div>
        <div class="form-group">
          <strong>long:</strong>
          <input type="text" name = "long" id = "long" class="form-control" >
        </div>

          <div class="form-group">
            <strong>:صورة للمسجد</strong>
             <input type="file" name="image" class="form-control" placeholder="mosque img">
            @error('image')
              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
           @enderror
        </div>




        <button type = "submit" class = "btn btn-success">حفظ</button>
      </form>
    </div>
  </div>
@endsection
