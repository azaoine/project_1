@extends('layouts.my_layoute')
@section('content')

<div class="container-fluif">
	<div class="row">
	<div class="col-sm-4" style="background-color:black; text-align: center; margin-top: 50px;">
<form  action="{{route('course.update',$course[0]->Courseid)}}" method="POST" enctype="multipart/form-data">
	@csrf 
	@method('PUT')
	<div class="form-group">
  <label class="form-label" style="color: white;">Course</label>
<input class="form-control" type="text" name="CourseName" value="{{$course[0]->CourseName}}" placeholder="CourseName"></input>
<br><br>
</div>
<div class="form-group">
<label class="form-label" style="color: white;">Duration</label>
<input class="form-control" type="Duration" name="Duration" value="{{$course[0]->Duration}}"></input>
<br><br></div>
<div class="form-group">

    <input class="form-control" type="file" name="file" value="{{$course[0]->file}}">

    <a target="_blank" href="files/{{$course[0]->file }}">{{$course[0]->file }}</a>

</div>


<div class="form-group">
	<label class="form-label" style="color: white;">Fees</label>
<input class="form-control" type="number" name="Fees" value="{{$course[0]->Fees}}"></input>
	<br><br>
	</div>
	<button class="btn btn-primary">Update</button>
</div>
</div>
</div>

</form>
@endsection


