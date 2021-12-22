@extends('layouts.app')
{{-- for Link Active --}}
@section('session','active')
@section('content')
<div class="container ">
    <div class="col-md-12">
<a href="{{ route('session.create')}}"><button ><strong>إنشاء دورة جديدة</strong></button>
</a>    
    <div class="table-responsive">
        <table class="table table-bordered table-condensed table-striped table-right">
            <thead>

                <th>ID</th>
                <th>اسم الدورة</th>
                <th>تاريخ البداية</th>
                <th>تاريخ النهاية</th>
                <th>اسم المسجد</th>
                <th>اسم المشرف </th>
                <th>نوع الدورة</th>
                <th>هل التسجيل متاح؟</th>

                <th  width="255px"><i class="fa fa-gear fa-lg mr"></i>العمليات</th>


            </thead>

            <tbody>
                @foreach($sessions as $session)
                <tr>

                    <td>{{$session->id }}</td>
                    <td>{{$session->name_ar }}</td>
                    <td>{{$session->start_date }}</td>
                    <td>{{$session->end_date }}</td>
                    <td>{{$session->mosque->name }}</td>
                    <td>{{$session->teacher->name_ar }}</td>
                    <td>{{$session->session_type->name_ar }}</td>
                    <td>{{$session->register_available }}</td>
                    
                    <td>
                        <a href="{{ route('session.edit', $session->id)}}">
                            <button  type="submit" class="btn btn-primary  pull-right bold "  >تعديل<i class="fa fa-pencil "></i></button>
                          </a>

                       <!--start Form For delete Superviser data  /////////////////////-->
                        <form  action="{{ route('session.destroy', $session->id)}}" method="post">
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
