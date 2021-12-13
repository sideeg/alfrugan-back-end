@extends('layouts.app')
{{-- for Link Active --}}
@section('group_detials','active')
@section('content')
<div class="row">
  <div class="col-md-9 table_title">
    <h1>{{$session->name_ar}}</h1>
</div>
<div class="col-md-9 table_title">
    <h1>{{$group->name}}</h1>
</div>

<div class="col-md-12">
  <hr>
</div>
</div>
<div class="row">

    
    <div class="col-md-12">
        <a href="/group/{{$group->id}}/detials/create"><button ><strong>add student to the group</strong></button></a>

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

        <div class="btn-group col-md-2 normal_add">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                Filter By group <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                @foreach ($groups as $group)
                <li><a href="/group/{{$group->id}}/detials">{{$group->name}}</a></li> 
                @endforeach
            </ul>
        </div>

        <div class="col-md-12">
            <hr>
        </div>

        
    </div>
</div>
<div class="container ">
    <div class="table-responsive">
        <table class="table table-bordered table-condensed table-striped table-right">
            <thead>

                <th>ID</th>
                <th>student Name</th>
                <th>student rate</th>
                
                <th  width="255px"><i class="fa fa-gear fa-lg mr"></i>Operations</th>


            </thead>

            <tbody>
                @foreach($groupDetials as $group_detials)
                    <tr>

                        <td>{{$group_detials->student->id }}</td>
                        <td>{{$group_detials->student->name_ar }}</td>
                        <td>{{$group_detials->student->rate }}</td>
                        
                        <td>
                            <a href="{{ route('group.detials.form', $group_detials->id)}}">
                                <button  type="submit" class="btn btn-primary  pull-right bold "  >الاستمارة<i class="fa fa-pencil "></i></button>
                            </a>

                        <!--start Form For delete Superviser data  /////////////////////-->
                            <form  action="{{ route('group.detials.destroy', $group_detials->id)}}" method="post">
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
