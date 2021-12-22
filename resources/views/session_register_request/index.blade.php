@extends('layouts.app')
{{-- for Link Active --}}
@section('session_reqester_request','active')
@section('content')
<div class="container ">
    <div class="col-md-12">
    
    <div class="table-responsive">
        <table class="table table-bordered table-condensed table-striped table-right">
            <thead>

                <th>ID</th>
                <th>اسم الشخص</th>
                <th> اسم الدورة</th>
                <th>النوع</th>
                <th>رقم الهاتف</th>
                <th>الرواية </th>
                <th>الحالة</th>
                <th>التقييم</th>

                <th  width="255px"><i class="fa fa-gear fa-lg mr"></i>العمليات</th>


            </thead>

            <tbody>
                @foreach($requests as $request)
                    <tr>
                        @if ($request->teacher )
                            <td>{{$request->teacher->id }}</td>
                            <td>{{$request->teacher->name_ar }}</td>
                            <td>{{$request->session->name_ar }}</td>
                            <td>teacher</td>
                            <td>{{$request->teacher->phone_number }}</td>
                            <td>{{$request->teacher->novel->name_ar }}</td>
                            <td>{{$request->teacher->status->name_ar }}</td>
                            <td>{{$request->teacher->rate }}</td>
                            <td>
                            
                            
                            @if ($request->teacher->status_id != 3)
                                <form  action="{{ route('accept.request.teacher', $request->id)}}" method="post">
                                    @csrf
                                    @method('POST')    
                                    <button  type="submit" class="btn btn-success pull-right bold" style=border-radius:5px; >
                                        قبول طلب التسجيل
                                        <i class="fa fa-pencil mr"></i></button>
                                </form>
                            @endif
                        @else 
                            <td>{{$request->student->id }}</td>
                            <td>{{$request->student->name_ar }}</td>
                            <td>{{$request->session->name_ar }}</td>
                            <td>student</td>
                            <td>{{$request->student->phone_number }}</td>
                            <td>{{$request->student->novel->name_ar }}</td>
                            <td>{{$request->student->status->name_ar }}</td>
                            <td>{{$request->student->rate }}</td>
                            <td>
                            

                                    @if ($request->student->status_id != 3)
                                        <form  action="{{ route('accept.request.student', $request->id)}}" method="post">
                                            @csrf
                                            @method('POST') 
                                            <button  type="submit" class="btn btn-success pull-right bold" style=border-radius:5px; >
                                                قبول طلب التسجيل
                                                <i class="fa fa-pencil mr"></i></button>
                                        </form>
                                    @endif
                                @endif

                                <form  action="{{ route('deny.register.request', $request->id)}}" method="post">
                                    @csrf
                                    @method('POST') 
                                    <button  type="submit" class="btn btn-danger pull-right bold" style=border-radius:5px; >
                                        رفض طلب التسجيل
                                            <i class="fa fa-pencil mr"></i>
                                    </button>
                                </form>
                                    
                                

                            </td>
                            <td>
                                @if ($request->teacher )
                                    <a href="{{ route('detials.teacher.register.request', $request->id)}}">
                                        <button  type="submit" class="btn btn-primary  pull-right bold "  >تفاصيل<i class="fa fa-pencil "></i></button>
                                    </a>
                                @else 
                                    <a href="{{ route('detials.student.register.request', $request->id)}}">
                                        <button  type="submit" class="btn btn-primary  pull-right bold "  >تفاصيل<i class="fa fa-pencil "></i></button>
                                    </a>
                                @endif

                                <!--start Form For delete Superviser data  /////////////////////-->
                                <form  action="{{ route('session_reqester_request.destroy', $request->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button  type="submit" class="btn btn-danger pull-left  confirm  bold " style=border-radius:5px >حذف<i class="fa fa-trash-o "></i></button>
                                </form>
                                <!--end Form For delete Superviser data  /////////////////////-->

                            </td>
                        
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</div>
</div>

@endsection
