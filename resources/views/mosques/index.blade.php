@extends('layouts.app')
{{-- for Link Active --}}
@section('mosque','active')
@section('content')
<div class="container ">
    <div class="col-md-12">
    <a href="{{ route('mosque.create')}}"><button ><strong>إضافة مسجد جديد</strong></button></a>

    <div class="table-responsive">
        <table class="table table-bordered table-condensed table-striped table-right">
            <thead>

                <th>ID</th>
                <th>الاسم</th>
                <th>وصف مختصر لموقع المسجد</th>
                <th>الوصف كامل لموقع المسجد </th>
                <th>lat</th>
                <th>long </th>
                <th>الصورة</th>
                <th  width="255px"><i class="fa fa-gear fa-lg mr"></i>العمليات</th>


            </thead>

            <tbody>
                @foreach($mosques as $mosque)
                <tr>

                    <td>{{$mosque->id }}</td>
                    <td>{{$mosque->name }}</td>
                    <td>{{$mosque->brief_location_description }}</td>
                    <td>{{$mosque->full_location_description }}</td>
                    <td>{{$mosque->lat }}</td>
                    <td>{{$mosque->long }}</td>
                    <td><img src="assert({{ $mosque->image }})" height="75" width="75" alt="img" /></td>
                   
                    <td>
                        <a href="{{ route('mosque.edit', $mosque->id)}}">
                            <button  type="submit" class="btn btn-primary  pull-right bold "  >تعديل<i class="fa fa-pencil "></i></button>
                          </a>

                       <!--start Form For delete Superviser data  /////////////////////-->
                        <form  action="{{ route('mosque.destroy', $mosque->id)}}" method="post">
                           @csrf
                           @method('DELETE')
                           <button  type="submit" class="btn btn-danger pull-left  confirm  bold " style=border-radius:5px >حذف<i class="fa fa-trash-o "></i></button>
                        </form>
                         <!--end Form For delete Superviser data  /////////////////////-->

                        </td>
                    {{-- <td>
                        <a href="{{ route('mosque.edit', $mosque->id)}}" class="btn btn-primary">Edit</a>

                        <form action="{{ route('mosque.destroy', $mosque->id)}}" method="post">
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
