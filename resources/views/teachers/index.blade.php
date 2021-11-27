@extends('layouts.app')
{{-- for Link Active --}}
@section('teacher','active')
@section('content')
<div class="container ">
    <div class="col-md-12">
<a href="{{ route('teacher.create')}}"><button ><strong>create new Teacher</strong></button>
</a>    
    <div class="table-responsive">
        <table class="table table-bordered table-condensed table-striped table-right">
            <thead>

                <th>ID</th>
                <th>Name</th>
                <th>country</th>
                <th>state</th>
                <th>Phone</th>
                <th>novel </th>
                <th>status</th>
                <th>rate</th>

                <th  width="255px"><i class="fa fa-gear fa-lg mr"></i>Operations</th>


            </thead>

            <tbody>
                @foreach($teachers as $teacher)
                <tr>

                    <td>{{$teacher->id }}</td>
                    <td>{{$teacher->name_ar }}</td>
                    <td>{{$teacher->country }}</td>
                    <td>{{$teacher->state }}</td>
                    <td>{{$teacher->phone_number }}</td>
                    <td>{{$teacher->novel->name_ar }}</td>
                    <td>{{$teacher->status->name_ar }}</td>
                    <td>{{$teacher->rate }}</td>
                    <td>
                        
                        <a href="{{ route('teacher.block', $teacher->id)}}">
                            <button  type="submit" class="btn btn-warning pull-right bold" style=border-radius:5px; >
                            @if ($teacher->status_id == 2)حظر المحفظ
                            @else @if ($teacher->status_id == 3 || $teacher->status_id == 4)
                            الغاء حظر المحفظ@endif @endif
                            <i class="fa fa-pencil mr"></i></button>
                          </a>

                          @if ($teacher->status_id == 1)
                          <a href="{{ route('teacher.accept', $teacher->id)}}">
                            <button  type="submit" class="btn btn-warning pull-right bold" style=border-radius:5px; >
                            قبول طلب التسجيل
                            <i class="fa fa-pencil mr"></i></button>
                          </a>
                          @endif
                        
                        

                    </td>
                    <td>
                        <a href="{{ route('teacher.edit', $teacher->id)}}">
                            <button  type="submit" class="btn btn-primary  pull-right bold "  >تعديل<i class="fa fa-pencil "></i></button>
                          </a>

                       <!--start Form For delete Superviser data  /////////////////////-->
                        <form  action="{{ route('teacher.destroy', $teacher->id)}}" method="post">
                           @csrf
                           @method('DELETE')
                           <button  type="submit" class="btn btn-danger pull-left  confirm  bold " style=border-radius:5px >حذف<i class="fa fa-trash-o "></i></button>
                        </form>
                         <!--end Form For delete Superviser data  /////////////////////-->

                        </td>
                    {{-- <td>
                        <a href="{{ route('teacher.edit', $teacher->id)}}" class="btn btn-primary">Edit</a>

                        <form action="{{ route('teacher.destroy', $teacher->id)}}" method="post">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>

                    </td> --}}
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</div>
</div>

@endsection
