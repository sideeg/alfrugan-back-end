@extends('layouts.app')
{{-- for Link Active --}}
@section('student','active')
@section('content')
<div class="container ">
    <div class="col-md-12">
<a href="{{ route('student.create')}}"><button ><strong>create new student</strong></button>
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
                @foreach($students as $student)
                <tr>

                    <td>{{$student->id }}</td>
                    <td>{{$student->name_ar }}</td>
                    <td>{{$student->country }}</td>
                    <td>{{$student->state }}</td>
                    <td>{{$student->phone_number }}</td>
                    <td>{{$student->novel->name_ar }}</td>
                    <td>{{$student->status->name_ar }}</td>
                    <td>{{$student->rate }}</td>
                    <td>
                        
                        <a href="{{ route('student.block', $student->id)}}">
                            <button  type="submit" class="btn btn-warning pull-right bold" style=border-radius:5px; >
                            @if ($student->status_id == 2)حظر الطالب
                            @else @if ($student->status_id == 3 || $student->status_id == 4)
                            الغاء حظر الطالب@endif @endif
                            <i class="fa fa-pencil mr"></i></button>
                          </a>

                          @if ($student->status_id == 1)
                          <a href="{{ route('student.accept', $student->id)}}">
                            <button  type="submit" class="btn btn-warning pull-right bold" style=border-radius:5px; >
                            قبول طلب التسجيل
                            <i class="fa fa-pencil mr"></i></button>
                          </a>
                          @endif
                        
                        

                    </td>
                    <td>
                        <a href="{{ route('student.edit', $student->id)}}">
                            <button  type="submit" class="btn btn-primary  pull-right bold "  >تعديل<i class="fa fa-pencil "></i></button>
                          </a>

                       <!--start Form For delete Superviser data  /////////////////////-->
                        <form  action="{{ route('student.destroy', $student->id)}}" method="post">
                           @csrf
                           @method('DELETE')
                           <button  type="submit" class="btn btn-danger pull-left  confirm  bold " style=border-radius:5px >حذف<i class="fa fa-trash-o "></i></button>
                        </form>
                         <!--end Form For delete Superviser data  /////////////////////-->

                        </td>
                    {{-- <td>
                        <a href="{{ route('student.edit', $student->id)}}" class="btn btn-primary">Edit</a>

                        <form action="{{ route('student.destroy', $student->id)}}" method="post">
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
