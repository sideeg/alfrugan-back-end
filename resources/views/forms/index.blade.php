@extends('layouts.app')
{{-- for Link Active --}}
@section('group','active')
@section('content')
<div class="row">
  <div class="col-md-9 table_title">
    <h1>{{$form->student->name_ar}}</h1>
</div>

<div class="col-md-12">
  <hr>
</div>
</div>
<div class="row">

    
    <div class="table-responsive">
        <table class="table table-bordered table-condensed table-striped table-right">
            <thead>

                <th>ID</th>
                <th>entry date</th>
                <th>start Surah</th>
                <th>start ayah</th>
                <th>end Surah</th>
                <th>end ayah</th>
                <th>rate</th>
                <th>teacher name </th>
                <th>notes</th>

                
                <!-- <th  width="255px"><i class="fa fa-gear fa-lg mr"></i>Operations</th> -->


            </thead>

            <tbody>
                @foreach($formDetials as $form)
                    <tr>

                        <td>{{$form->id }}</td>
                        <td>{{$form->entry_date }}</td>
                        <td>{{$form->start_Surah }}</td>
                        <td>{{$form->start_ayah }}</td>
                        <td>{{$form->end_Surah }}</td>
                        <td>{{$form->end_ayah }}</td>
                        <td>{{$form->rate }}</td>
                        <td>{{$form->teacher->name_ar }}</td>
                        <td>{{$form->note }}</td>

                        
                        <!-- <td>
                            <a href="{{ route('group.edit', $group->id)}}">
                                <button  type="submit" class="btn btn-primary  pull-right bold "  >تعديل<i class="fa fa-pencil "></i></button>
                            </a>

                        <!--start Form For delete Superviser data  /////////////////////-->
                            <!-- <form  action="{{ route('group.destroy', $group->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button  type="submit" class="btn btn-danger pull-left  confirm  bold " style=border-radius:5px >حذف<i class="fa fa-trash-o "></i></button>
                            </form>
                            <!--end Form For delete Superviser data  /////////////////////-->

                        <!-- </td> --> 
                        
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</div>
</div>

@endsection
