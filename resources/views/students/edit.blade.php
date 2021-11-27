@extends('layouts.app')
@section('student','active')
@section('content')

<div class="container ">
  <div class="row mt-5">
    <div class="col-sm-8 offset-sm-2">
        <form  action="{{'/student/' . $student->id}}" method="post" role="form" enctype="multipart/form-data" class="form-container">
            @csrf
                @method('PUT')
        <div class="form-group">
          <label for="name_ar">name AR:</label>
          <input type="text" name = "name_ar" id = "name_ar" class="form-control" value="{{$student->name_ar}}">
        </div>
        <div class="form-group">
          <label for="name_en">name EN:</label>
          <input type="text" name = "name_en" id = "name_en" class="form-control" value="{{$student->name_en}}">
        </div>
        <div class="form-group">
            <label for="password">password:</label>
            <input type="text" name = "password" id = "password" class="form-control" value="{{$student->password}}">
          </div>
        <div class="form-group">
          <label for="phone_number">phone:</label>
          <input type="text" name = "phone_number" id = "phone_number" class="form-control" value="{{$student->phone_number}}" >
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="text" name = "email" id = "email" class="form-control" value="{{$student->email}}" >
        </div>
        <div class="form-group">
          <label for="age">AGE:</label>
          <input type="text" name = "age" id = "age" class="form-control" value="{{$student->age}}">
        </div>
        <div class="form-group">
          <label for="sex">TYPE:</label>
          <input type="text" name = "sex" id = "sex" class="form-control" value="{{$student->sex}}">
        </div>
        <div class="form-group">
            <label for="country">country:</label>
            <input type="text" name = "country" id = "country" class="form-control" value="{{$student->country}}">
          </div>
        <div class="form-group">
          <label for="state">state:</label>
          <input type="text" name = "state" id = "state" class="form-control" value="{{$student->state}}" >
        </div>
        <div class="form-group">
          <label for="Specialization">Specialization:</label>
          <input type="text" name = "Specialization" id = "Specialization" class="form-control" value="{{$student->Specialization}}" >
        </div>
        {{-- ROW --}}
          <div class="row">
            {{-- Start qualification --}}
              <div class="col">
                <label class="mt-2" for="">qualification Type</label>
                <select name="qualification_id" required class="custom-select mr-sm-2"
                id="inlineFormCustomSelect" >
                  <option></option>
                  @foreach ($qualifications as $qualification)
                    <option value="{{ $qualification->id }}">{{ $qualification->name_ar }}</option>

                  @endforeach

                </select>
              </div>
            {{-- End qualification --}}
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
            {{-- Start status --}}
              <div class="col">
                <label class="mt-2" for="">status Type</label>
                <select name="status_id" required class="custom-select mr-sm-2"
                id="inlineFormCustomSelect">
                  <option></option>
                  @foreach ($statuss as $status)
                    <option value="{{ $status->id }}">{{ $status->name_ar }}</option>

                  @endforeach

                </select>
              </div>
            {{-- End status --}}

        <button type = "submit" class = "btn btn-success">Submit</button>
      </form>
    </div>
  </div>
@endsection
