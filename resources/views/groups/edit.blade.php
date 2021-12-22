@extends('layouts.app')
@section('group','active')
@section('content')

<div class="container ">
  <div class="row mt-5">
    <div class="col-sm-8 offset-sm-2">
      <form action="{{'/group/' . $group->id}}" method = "post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <strong>: اسم المحفظ</strong>
            <label  class="form-control" >{{$group->teacher->name_ar}}</label>
        </div>
        <div class="form-group">
          <strong>:اسم الدورة </strong>
          <label class="form-control" >{{$group->session->name_ar}}</label>
        </div>
        <div class="form-group">
          <strong>name:</strong>
          <input type="text" name = "name" id = "name" class="form-control" value="{{$group->name}}">
        </div>
        {{-- Start teacher --}}
              <div class="col">
                <label class="mt-2" for="">اسم المحفظ</label>
                <select name="teacher_id" required class="custom-select mr-sm-2"id="inlineFormCustomSelect">
                  <option></option>
                  @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->name_ar }}</option>

                  @endforeach

                </select>
              </div>
            {{-- End teacher --}}
        

        <button type = "submit" class = "btn btn-success">حفظ</button>
      </form>
    </div>
  </div>
@endsection
