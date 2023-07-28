@extends('layouts.my_layoute')
@section('content')
<div class="container-fluif">
<div class="row">
<div class="col-sm-4" style="background-color:black;">
<form method="POST" action="{{route('registration.update',$registration[0]->created_at)}}" style="text-align: center;">
	@csrf
	@method('PUT')
    <div class="form-group">
       Course 
<select class="form-control"  name="Courseid" >
   @foreach($courses as $course)

    @if($course->Courseid==$registration[0]->Courseid)
       <option value="{{$course->Courseid}}" selected>{{$course->CourseName}}</option>
       @else
       <option value="{{$course->Courseid}}">{{$course->CourseName}}</option>
       @endif
   @endforeach
        </select><br>
</div>
<div class="form-group">
     Student : <select class="form-control"  name="Studid">
    @foreach($students as $student)
    @if($student->Studid==$registration[0]->Studid)
   <option value="{{$student->Studid}}" selected>{{$student->FirstName}}</option>
   @else
   <option value="{{$student->Studid}}">{{$student->FirstName}}</option>
   @endif
       @endforeach
        </select><br>
        </div>
        <div class="form-group">
        DOJ : <input class="form-control" type="date" name="DOJ" value="{{$registration[0]->DOJ}}">
       <br>
   </div>
        <button class="btn btn-info">Update</button>
</div>
</div>
</div>
</form>
@endsection


		