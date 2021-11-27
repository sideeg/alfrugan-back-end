@extends('layouts.app')
@section('session','active')
@section('content')

<div class="container ">
  <div class="row mt-5">
    <div class="col-sm-8 offset-sm-2">
        <form  action="{{'/session/' . $session->id}}" method="post" role="form" enctype="multipart/form-data" class="form-container">
            @csrf
                @method('PUT')
        <div class="form-group">
          <label for="name_ar">name AR:</label>
          <input type="text" name = "name_ar" id = "name_ar" class="form-control" value="{{$session->name_ar}}">
        </div>
        <div class="form-group">
          <label for="name_en">name EN:</label>
          <input type="text" name = "name_en" id = "name_en" class="form-control" value="{{$session->name_en}}">
        </div>
        <div class="form-group">
            <label for="start_date">start_date:</label>
            <input type="date" name = "start_date" id = "start_date" class="form-control" value="{{$session->start_date}}">
          </div>
        <div class="form-group">
          <label for="end_date">end date:</label>
          <input type="date" name = "end_date" id = "end_date" class="form-control" value="{{$session->end_date}}" >
        </div>
        <div class="form-group">
          <label for="brief_ar">brief_ar:</label>
          <input type="text" name = "brief_ar" id = "brief_ar" class="form-control" value="{{$session->brief_ar}}" >
        </div>
        <div class="form-group">
          <label for="brief_en">brief_en:</label>
          <input type="text" name = "brief_en" id = "brief_en" class="form-control" value="{{$session->brief_en}}">
        </div>
        <div class="form-group">
          <label for="reason_registry_suspension">reason_registry_suspension:</label>
          <input type="text" name = "reason_registry_suspension" id = "reason_registry_suspension" class="form-control" value="{{$session->reason_registry_suspension}}">
        </div>
        <div class="form-group">
            <label for="register_available">register_available:</label>
            <input type="text" name = "register_available" id = "register_available" class="form-control" value="{{$session->register_available}}">
          </div>
        
        {{-- ROW --}}
          <div class="row">
            {{-- Start mosque --}}
              <div class="col">
                <label class="mt-2" for="">mosque name</label>
                <select name="mosque_id" required class="custom-select mr-sm-2"
                id="inlineFormCustomSelect" >
                  <option></option>
                  @foreach ($mosques as $mosque)
                    <option value="{{ $mosque->id }}">{{ $mosque->name }}</option>

                  @endforeach

                </select>
              </div>
            {{-- End mosque --}}
            {{-- Start teacher --}}
              <div class="col">
                <label class="mt-2" for="">teacher name</label>
                <select name="teacher_id" required class="custom-select mr-sm-2"
                id="inlineFormCustomSelect">
                  <option></option>
                  @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->name_ar }}</option>

                  @endforeach

                </select>
              </div>
            {{-- End teacher --}}
            {{-- Start session_type --}}
              <div class="col">
                <label class="mt-2" for="">session Type</label>
                <select name="session_type_id" required class="custom-select mr-sm-2"
                id="inlineFormCustomSelect">
                  <option></option>
                  @foreach ($sessionTypes as $session_type)
                    <option value="{{ $session_type->id }}">{{ $session_type->name_ar }}</option>

                  @endforeach

                </select>
              </div>
            {{-- End session_type --}}
          </div>
          {{-- ROW --}}

            <div class="form-group">
            <strong>session Image:</strong>
             <input type="file" name="image" class="form-control" placeholder="session img">
            @error('image')
              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
           @enderror
        </div>

        <button type = "submit" class = "btn btn-success">Submit</button>
      </form>
    </div>
  </div>
@endsection
