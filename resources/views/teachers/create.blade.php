@extends('layouts.app')
@section('teacher','active')
@section('content')

<div class="container ">
  <div class="row mt-5">
    <div class="col-sm-8 offset-sm-2">
      <form action="{{route('teacher.store')}}" method = "post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <strong>name EN:</strong>
          <input type="text" name = "name_en" id = "name" class="form-control" >
        </div>
        <div class="form-group">
          <strong>name AR:</strong>
          <input type="text" name = "name_ar" id = "name" class="form-control" >
        </div>
        <div class="form-group">
            <strong>password:</strong>
            <input type="text" name = "password" id = "password" class="form-control" >
          </div>
        <div class="form-group">
          <strong>phone:</strong>
          <input type="number" name = "phone_number" id = "phone" class="form-control" >
        </div>
        <div class="form-group">
          <strong>Email:</strong>
          <input type="email" name = "email" id = "email" class="form-control" >
        </div>
        <div class="form-group">
          <strong>Age:</strong>
          <input type="number" name="age" id="age" class="form-control" >
        </div>
        <div class="form-group">
          <strong>country:</strong>
          <input type="text" name = "country" id = "country" class="form-control" >
        </div>
        <div class="form-group">
          <strong>state:</strong>
          <input type="text" name = "state" id = "state" class="form-control" >
        </div>

        {{-- ROW --}}
          <div class="row">
            {{-- Start novel --}}
              <div class="col">
                <label class="mt-2" for="">novel Type</label>
                <select name="novel_id" required class="custom-select mr-sm-2"
                id="inlineFormCustomSelect">
                  <option></option>
                  @foreach ($novels as $novel)
                    <option value="{{ $novel->id }}">{{ $novel->name_ar }}</option>

                  @endforeach

                </select>
              </div>
            {{-- End novel --}}
          </div>
        {{-- ROW --}}
        {{-- ROW --}}
          <div class="row">
            {{-- Start qualification --}}
              <div class="col">
                <label class="mt-2" for="">qualification Type</label>
                <select name="qualification_id" required class="custom-select mr-sm-2"
                id="inlineFormCustomSelect">
                  <option></option>
                  @foreach ($qualifications as $qualification)
                    <option value="{{ $qualification->id }}">{{ $qualification->name_ar }}</option>

                  @endforeach

                </select>
              </div>
            {{-- End qualification --}}
            {{-- Start sex --}}
            <div class="col">
                <label class="mt-2" for="">Type</label>
                <select name="sex" required class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                  <option value="0">male</option>
                  <option value="1">Female</option>
                </select>
            </div>
            {{-- End sex --}}
          </div>
        {{-- ROW --}}
        
        <div class="form-group">
          <strong>Specialization:</strong>
          <input type="text" name = "Specialization" id = "Specialization" class="form-control" >
        </div>
        <button type = "submit" class = "btn btn-success">Submit</button>
      </form>
    </div>
  </div>
@endsection
