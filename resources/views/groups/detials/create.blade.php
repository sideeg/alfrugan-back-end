@extends('layouts.app')
@section('group','active')
@section('content')

<div class="container ">
  <div class="row mt-5">
    <div class="col-sm-8 offset-sm-2">
      <form action="/group/{{$group->id}}/detials/store" method = "post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <input type="text" name ="group_id" id ="group_id" hidden class="form-control" value="{{$group->id}}">

        {{-- Start teacher --}}
          <div class="col">
            <label class="mt-2" for="">student name</label>
            <select name="student_id" required class="custom-select mr-sm-2"id="inlineFormCustomSelect">
              <option></option>
              @foreach ($notDistributionStudent as $notDistribution)
                <option value="{{ $notDistribution->student->id }}">{{ $notDistribution->student->name_ar }}</option>

              @endforeach

            </select>
          </div>
        {{-- End teacher --}}
        




        <button type = "submit" class = "btn btn-success">Submit</button>
      </form>
    </div>
  </div>
@endsection
