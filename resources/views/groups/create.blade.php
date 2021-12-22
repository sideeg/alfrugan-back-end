@extends('layouts.app')
@section('group','active')
@section('content')

<div class="container ">
  <div class="row mt-5">
    <div class="col-sm-8 offset-sm-2">
      <form action="{{route('group.store')}}" method = "post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="form-group">
          <strong>:اسم المجموعة</strong>
          <input type="text" name = "name" id = "name" class="form-control" >
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
        {{-- Start session --}}
          <div class="col">
            <label class="mt-2" for="">اسم الدورة</label>
            <select name="session_id" required class="custom-select mr-sm-2"id="inlineFormCustomSelect">
              <option></option>
              @foreach ($sessions as $session)
                <option value="{{ $session->id }}">{{ $session->name_ar }}</option>

              @endforeach

            </select>
          </div>
        {{-- End session --}}
        




        <button type = "submit" class = "btn btn-success">حفظ</button>
      </form>
    </div>
  </div>
@endsection
