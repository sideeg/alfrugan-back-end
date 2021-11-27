@extends('layouts.app')
@section('session','active')
@section('content')

<div class="container ">
  <div class="row mt-5">
    <div class="col-sm-8 offset-sm-2">
      <form action="{{route('session.store')}}" method = "post" enctype="multipart/form-data">
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
            <strong>start_date:</strong>
            <input type="date" name = "start_date" id = "start_date" class="form-control" >
          </div>
        <div class="form-group">
          <strong>end_date:</strong>
          <input type="date" name = "end_date" id = "end_date" class="form-control" >
        </div>
        <div class="form-group">
          <strong>brief_ar:</strong>
          <input type="brief_ar" name = "brief_ar" id = "brief_ar" class="form-control" >
        </div>
        <div class="form-group">
          <strong>brief_en:</strong>
          <input type="text" name="brief_en" id="brief_en" class="form-control" >
        </div>
        
        <div class="col">
          <label class="mt-2" for="">register_available</label>
          <select name="register_available" required class="custom-select mr-sm-2" id="inlineFormCustomSelect">
              <option value="0">No</option>
              <option value="1">YES</option>
          </select>
        </div>
        <div class="form-group">
          <strong>reason_registry_suspension:</strong>
          <input type="text" name = "reason_registry_suspension" id = "reason_registry_suspension" class="form-control" >
        </div>

        {{-- ROW --}}
          <div class="row">
            {{-- Start mosque --}}
              <div class="col">
                <label class="mt-2" for="">mosque name</label>
                <select name="mosque_id" required class="custom-select mr-sm-2"
                id="inlineFormCustomSelect">
                  <option></option>
                  @foreach ($mosques as $mosque)
                    <option value="{{ $mosque->id }}">{{ $mosque->name }}</option>

                  @endforeach

                </select>
              </div>
            {{-- End mosque --}}
          </div>
        {{-- ROW --}}
        {{-- ROW --}}
          <div class="row">
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
            <strong>mosque Image:</strong>
             <input type="file" name="image" class="form-control" placeholder="mosque img">
            @error('image')
              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
           @enderror
        </div>

        <button type = "submit" class = "btn btn-success">Submit</button>
      </form>
    </div>
  </div>
@endsection
