@extends('layouts.my_layoute')
@section('content')
<div class="container-fluif">
<div class="row">
<div class="col-md-8" style="background-color:black;  border-radius:10px;">

<form method="POST" action="{{route('registration.store')}}" style="text-align: center; margin-top: 30px;">
	@csrf
   <h3 style="color:white;">Create a new registration</h3>
   <div class="form-group">
   <h3 style="color:white;">Course</h3> 
<select  class="form-control"   name="Courseid" >
    @foreach($courses as $course)
       <option  value="{{$course->Courseid}}">{{$course->CourseName}}</option>
       @endforeach
        </select><br><br>
</div>
<div class="form-group">
  <h3 style="color:white;">Student</h3>

   <select class="form-control"  name="Studid" >
    @foreach($students as $student)
       <option  value="{{$student->Studid}}">{{$student->FirstName}}</option>
       @endforeach
        </select><br><br>
</div>
<div class="form-group">
   <h3 style="color:white;">DOJ</h3>
   <input class="form-control" type="date" name="DOJ">
   </div>
        <button class="btn btn-primary">Ajouter</button>
</div>
</div>
</div>
</form>
@endsection

		