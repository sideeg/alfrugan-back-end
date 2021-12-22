@extends('layouts.app')
{{-- for Link Active --}}
@section('group','active')
@section('content')
<div class="row">
  <div class="col-md-9 table_title">
    <h1>{{$session->name_ar}}</h1>
</div>

<div class="col-md-12">
  <hr>
</div>
</div>
<div class="row">

    <div class="container ">
        <div class="col-md-12">
        <a href="{{ route('group.create')}}"><button ><strong>إنشاء مجموعة جديدة</strong></button></a>

        <div class="btn-group col-md-2 normal_add">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                Filter By session <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                @foreach ($sessions as $session)
                <li><a href="/group/filterby/session/{{$session->id}}">{{$session->name_ar}}</a></li> 
                @endforeach
            </ul>
        </div>

        <div class="col-md-12">
            <hr>
        </div>
</div>
    <div class="table-responsive">
        <table class="table table-bordered table-condensed table-striped table-right">
            <thead>

                <th>ID</th>
                <th>اسم المجموعة</th>
                <th>اسم الدورة</th>
                <th>اسم المحفظ </th>
                
                <th  width="255px"><i class="fa fa-gear fa-lg mr"></i>العمليات</th>


            </thead>

            <tbody>
                @foreach($groups as $group)
                    <tr>

                        <td>{{$group->id }}</td>
                        <td>{{$group->name }}</td>
                        <td>{{$group->session->name_ar }}</td>
                        <td>{{$group->teacher->name_ar }}</td>
                        
                        <td>
                            <a href="{{ route('group.edit', $group->id)}}">
                                <button  type="submit" class="btn btn-primary  pull-right bold "  >تعديل<i class="fa fa-pencil "></i></button>
                            </a>
                            <a href="/group/{{$group->id}}/detials">
                                <button  type="submit" class="btn btn-primary  pull-right bold "  >تفاصيل المجموعة<i class="fa fa-pencil "></i></button>
                            </a>

                        <!--start Form For delete Superviser data  /////////////////////-->
                            <form  action="{{ route('group.destroy', $group->id)}}" method="post">
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
