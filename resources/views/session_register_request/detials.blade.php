@extends('layouts.app')
@section('session_reqester_request','active')
@section('content')

<div class="container ">
  <div class="row mt-5">
    <div class="col-sm-8 offset-sm-2">
       
        <div class="form-group">
          <label for="name_ar">name AR:</label>
          <label class="form-control">{{$detials->name_ar}}</label>
        </div>
        <div class="form-group">
          <label for="name_en">name EN:</label>
          <label class="form-control">{{$detials->name_en}}</label>
        </div>
        <div class="form-group">
            <label for="password">password:</label>
            <label class="form-control">{{$detials->password}}</label>
          </div>
        <div class="form-group">
          <label for="phone_number">phone:</label>
          <label class="form-control" >{{$detials->phone_number}}</label>
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <label class="form-control" >{{$detials->email}}</label>
        </div>
        <div class="form-group">
          <label for="age">AGE:</label>
          <label class="form-control">{{$detials->age}}</label>
        </div>
        <div class="form-group">
          <label for="sex">TYPE:</label>
          <label class="form-control">{{$detials->sex}}</label>
        </div>
        <div class="form-group">
            <label for="country">country:</label>
            <label class="form-control">{{$detials->country}}</label>
          </div>
        <div class="form-group">
          <label for="state">state:</label>
          <label class="form-control"  >{{$detials->state}}</label>
        </div>
        <div class="form-group">
          <label for="Specialization">Specialization:</label>
          <label  class="form-control"  >{{$detials->Specialization}}</label>
        </div>
        {{-- ROW --}}
          <div class="row">
            {{-- Start qualification --}}
              <div class="col">
                <label class="mt-3" for="">qualification Type : </label>
                <label class="mt-3" >{{$detials->qualification->name_ar}}</label>
              </div>
            {{-- End qualification --}}
            {{-- Start novel --}}
              <div class="col">
                <label class="mt-3" for="">novel Type: </label>
                <label class="mt-3" >{{$detials->novel->name_ar}}</label>

              </div>
            {{-- End novel --}}
            {{-- Start status --}}
              <div class="col">
                <label class="mt-1" for="">status Type: </label>
                <label class="mt-3" >{{$detials->status->name_ar}}</label>

              </div>
            {{-- End status --}}
          </div>
          {{-- END ROW--}}
          {{-- Start ROW--}}
          <div class="row">
            <div class="col">
              <!--start Form For delete Superviser data  /////////////////////-->
              <form  action="{{ route('session_reqester_request.destroy', $request->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button  type="submit" class="btn btn-danger pull-left  confirm  bold " style=border-radius:5px >حذف<i class="fa fa-trash-o "></i></button>
              </form>
              <!--end Form For delete Superviser data  /////////////////////-->
            </div>

            <div class="col">
                {{--deny request start --}}
                <form  action="{{ route('deny.register.request', $request->id)}}" method="post">
                  @csrf
                  @method('POST') 
                  <button  type="submit" class="btn btn-danger pull-right bold" style=border-radius:5px; >
                    رفض طلب التسجيل
                    <i class="fa fa-pencil mr"></i>
                  </button>
                </form>
            </div>
            <div class="col">
            @if ($request->teacher )
              @if ($request->teacher->status_id != 3)
                <form  action="{{ route('accept.request.teacher', $request->id)}}" method="post">
                  @csrf
                  @method('POST')    
                  <button  type="submit" class="btn btn-success pull-right bold" style=border-radius:5px; >
                    قبول طلب التسجيل
                    <i class="fa fa-pencil mr"></i>
                  </button>
                </form>
              @endif
            @else 
              @if ($request->student->status_id != 3)
                <form  action="{{ route('accept.request.student', $request->id)}}" method="post">
                  @csrf
                  @method('POST') 
                  <button  type="submit" class="btn btn-success pull-right bold" style=border-radius:5px; >
                    قبول طلب التسجيل
                    <i class="fa fa-pencil mr"></i>
                  </button>
                </form>
              @endif
            @endif
          </div>
          </div>
          {{-- END ROW--}}

    </div>
  </div>
@endsection
